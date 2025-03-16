<script type="text/javascript">
//--------------------- Copyright Block ----------------------
/* 

PrayTimes.js: Prayer Times Calculator (ver 2.3)
Copyright (C) 2007-2011 PrayTimes.org

Developer: Hamid Zarrabi-Zadeh
License: GNU LGPL v3.0

TERMS OF USE:
	Permission is granted to use this code, with or 
	without modification, in any website or application 
	provided that credit is given to the original work 
	with a link back to PrayTimes.org.

This program is distributed in the hope that it will 
be useful, but WITHOUT ANY WARRANTY. 

PLEASE DO NOT REMOVE THIS COPYRIGHT BLOCK.
 
*/ 


//--------------------- Help and Manual ----------------------
/*

User's Manual: 
http://praytimes.org/manual

Calculation Formulas: 
http://praytimes.org/calculation



//------------------------ User Interface -------------------------


	getTimes (date, coordinates [, timeZone [, dst [, timeFormat]]]) 
	
	setMethod (method)       // set calculation method 
	adjust (parameters)      // adjust calculation parameters	
	tune (offsets)           // tune times by given offsets 

	getMethod ()             // get calculation method 
	getSetting ()            // get current calculation parameters
	getOffsets ()            // get current time offsets


//------------------------- Sample Usage --------------------------


	var PT = new PrayTimes('ISNA');
	var times = PT.getTimes(new Date(), [43, -80], -5);
	document.write('Sunrise = '+ times.sunrise)


*/
	

//----------------------- PrayTimes Class ------------------------
function PrayTimes(t) {
    var i,
        a,
        n,
        e,
        r,
        s = {
            MWL: { name: "Muslim World League", params: { fajr: 18, isha: 17 } },
            KEMENAG: { name: "Kemenag Indonesia", params: { fajr: 20, isha: 18 } },
            ISNA: { name: "Islamic Society of North America (ISNA)", params: { fajr: 15, isha: 15 } },
            Egypt: { name: "Egyptian General Authority of Survey", params: { fajr: 19.5, isha: 17.5 } },
            Makkah: { name: "Umm Al-Qura University, Makkah", params: { fajr: 18.5, isha: "90 min" } },
            Karachi: { name: "University of Islamic Sciences, Karachi", params: { fajr: 18, isha: 18 } },
            Tehran: { name: "Institute of Geophysics, University of Tehran", params: { fajr: 17.7, isha: 14, maghrib: 4.5, midnight: "Jafari" } },
            Jafari: { name: "Shia Ithna-Ashari, Leva Institute, Qum", params: { fajr: 16, isha: 14, maghrib: 4, midnight: "Jafari" } },
        },
        h = "KEMENAG",
        o = { imsak: "10 min", dhuhr: "0 min", asr: "Standard", highLats: "NightMiddle" },
        u = "24h",
        m = ["am", "pm"],
        c = {},
        f = { maghrib: "0 min", midnight: "Standard" };
    for (var d in s) {
        var l = s[d].params;
        for (var g in f) void 0 === l[g] && (l[g] = f[g]);
    }
    l = s[(h = s[t] ? t : h)].params;
    for (var M in l) o[M] = l[M];
    for (var d in { imsak: "Imsak", fajr: "Fajr", sunrise: "Sunrise", dhuhr: "Dhuhr", asr: "Asr", sunset: "Sunset", maghrib: "Maghrib", isha: "Isha", midnight: "Midnight" }) c[d] = 0;
    return {
        setMethod: function (t) {
            s[t] && (this.adjust(s[t].params), (h = t));
        },
        adjust: function (t) {
            for (var i in t) o[i] = t[i];
        },
        tune: function (t) {
            for (var i in t) c[i] = t[i];
        },
        getMethod: function () {
            return h;
        },
        getSetting: function () {
            return o;
        },
        getOffsets: function () {
            return c;
        },
        getDefaults: function () {
            return s;
        },
        getTimes: function (t, s, h, o, m) {
            return (
                (i = 1 * s[0]),
                (a = 1 * s[1]),
                (n = s[2] ? 1 * s[2] : 0),
                (u = m || u),
                t.constructor === Date && (t = [t.getFullYear(), t.getMonth() + 1, t.getDate()]),
                (void 0 !== h && "auto" != h) || (h = this.getTimeZone(t)),
                (void 0 !== o && "auto" != o) || (o = this.getDst(t)),
                (e = 1 * h + (1 * o ? 1 : 0)),
                (r = this.julian(t[0], t[1], t[2]) - a / 360),
                this.computeTimes()
            );
        },
        getFormattedTime: function (t, i, a) {
            if (isNaN(t)) return "-----";
            if ("Float" == i) return t;
            (a = a || m), (t = DMath.fixHour(t + 0.5 / 60));
            var n = Math.floor(t),
                e = Math.floor(60 * (t - n)),
                r = "12h" == i ? a[n < 12 ? 0 : 1] : "";
            return ("24h" == i ? this.twoDigitsFormat(n) : ((n + 12 - 1) % 12) + 1) + ":" + this.twoDigitsFormat(e) + (r ? " " + r : "");
        },
        midDay: function (t) {
            var i = this.sunPosition(r + t).equation;
            return DMath.fixHour(12 - i);
        },
        sunAngleTime: function (t, a, n) {
            var e = this.sunPosition(r + a).declination,
                s = this.midDay(a),
                h = (1 / 15) * DMath.arccos((-DMath.sin(t) - DMath.sin(e) * DMath.sin(i)) / (DMath.cos(e) * DMath.cos(i)));
            return s + ("ccw" == n ? -h : h);
        },
        asrTime: function (t, a) {
            var n = this.sunPosition(r + a).declination,
                e = -DMath.arccot(t + DMath.tan(Math.abs(i - n)));
            return this.sunAngleTime(e, a);
        },
        sunPosition: function (t) {
            var i = t - 2451545,
                a = DMath.fixAngle(357.529 + 0.98560028 * i),
                n = DMath.fixAngle(280.459 + 0.98564736 * i),
                e = DMath.fixAngle(n + 1.915 * DMath.sin(a) + 0.02 * DMath.sin(2 * a)),
                r = (DMath.cos(a), DMath.cos(2 * a), 23.439 - 36e-8 * i),
                s = DMath.arctan2(DMath.cos(r) * DMath.sin(e), DMath.cos(e)) / 15,
                h = n / 15 - DMath.fixHour(s);
            return { declination: DMath.arcsin(DMath.sin(r) * DMath.sin(e)), equation: h };
        },
        julian: function (t, i, a) {
            i <= 2 && ((t -= 1), (i += 12));
            var n = Math.floor(t / 100),
                e = 2 - n + Math.floor(n / 4);
            return Math.floor(365.25 * (t + 4716)) + Math.floor(30.6001 * (i + 1)) + a + e - 1524.5;
        },
        computePrayerTimes: function (t) {
            t = this.dayPortion(t);
            var i = o;
            return {
                imsak: this.sunAngleTime(this.eval(i.imsak), t.imsak, "ccw"),
                fajr: this.sunAngleTime(this.eval(i.fajr), t.fajr, "ccw"),
                sunrise: this.sunAngleTime(this.riseSetAngle(), t.sunrise, "ccw"),
                dhuhr: this.midDay(t.dhuhr),
                asr: this.asrTime(this.asrFactor(i.asr), t.asr),
                sunset: this.sunAngleTime(this.riseSetAngle(), t.sunset),
                maghrib: this.sunAngleTime(this.eval(i.maghrib), t.maghrib),
                isha: this.sunAngleTime(this.eval(i.isha), t.isha),
            };
        },
        computeTimes: function () {
            for (var t = { imsak: 5, fajr: 5, sunrise: 6, dhuhr: 12, asr: 13, sunset: 18, maghrib: 18, isha: 18 }, i = 1; i <= 1; i++) t = this.computePrayerTimes(t);
            return ((t = this.adjustTimes(t)).midnight = "Jafari" == o.midnight ? t.sunset + this.timeDiff(t.sunset, t.fajr) / 2 : t.sunset + this.timeDiff(t.sunset, t.sunrise) / 2), (t = this.tuneTimes(t)), this.modifyFormats(t);
        },
        adjustTimes: function (t) {
            var i = o;
            for (var n in t) t[n] += e - a / 15;
            return (
                "None" != i.highLats && (t = this.adjustHighLats(t)),
                this.isMin(i.imsak) && (t.imsak = t.fajr - this.eval(i.imsak) / 60),
                this.isMin(i.maghrib) && (t.maghrib = t.sunset + this.eval(i.maghrib) / 60),
                this.isMin(i.isha) && (t.isha = t.maghrib + this.eval(i.isha) / 60),
                (t.dhuhr += this.eval(i.dhuhr) / 60),
                t
            );
        },
        asrFactor: function (t) {
            return { Standard: 1, Hanafi: 2 }[t] || this.eval(t);
        },
        riseSetAngle: function () {
            return 0.833 + 0.0347 * Math.sqrt(n);
        },
        tuneTimes: function (t) {
            for (var i in t) t[i] += c[i] / 60;
            return t;
        },
        modifyFormats: function (t) {
            for (var i in t) t[i] = this.getFormattedTime(t[i], u);
            return t;
        },
        adjustHighLats: function (t) {
            var i = o,
                a = this.timeDiff(t.sunset, t.sunrise);
            return (
                (t.imsak = this.adjustHLTime(t.imsak, t.sunrise, this.eval(i.imsak), a, "ccw")),
                (t.fajr = this.adjustHLTime(t.fajr, t.sunrise, this.eval(i.fajr), a, "ccw")),
                (t.isha = this.adjustHLTime(t.isha, t.sunset, this.eval(i.isha), a)),
                (t.maghrib = this.adjustHLTime(t.maghrib, t.sunset, this.eval(i.maghrib), a)),
                t
            );
        },
        adjustHLTime: function (t, i, a, n, e) {
            var r = this.nightPortion(a, n),
                s = "ccw" == e ? this.timeDiff(t, i) : this.timeDiff(i, t);
            return (isNaN(t) || s > r) && (t = i + ("ccw" == e ? -r : r)), t;
        },
        nightPortion: function (t, i) {
            var a = o.highLats,
                n = 0.5;
            return "AngleBased" == a && (n = (1 / 60) * t), "OneSeventh" == a && (n = 1 / 7), n * i;
        },
        dayPortion: function (t) {
            for (var i in t) t[i] /= 24;
            return t;
        },
        getTimeZone: function (t) {
            var i = t[0],
                a = this.gmtOffset([i, 0, 1]),
                n = this.gmtOffset([i, 6, 1]);
            return Math.min(a, n);
        },
        getDst: function (t) {
            return 1 * (this.gmtOffset(t) != this.getTimeZone(t));
        },
        gmtOffset: function (t) {
            var i = new Date(t[0], t[1] - 1, t[2], 12, 0, 0, 0),
                a = i.toGMTString();
            return (i - new Date(a.substring(0, a.lastIndexOf(" ") - 1))) / 36e5;
        },
        eval: function (t) {
            return 1 * (t + "").split(/[^0-9.+-]/)[0];
        },
        isMin: function (t) {
            return -1 != (t + "").indexOf("min");
        },
        timeDiff: function (t, i) {
            return DMath.fixHour(i - t);
        },
        twoDigitsFormat: function (t) {
            return t < 10 ? "0" + t : t;
        },
    };
}
var DMath = {
    dtr: function (t) {
        return (t * Math.PI) / 180;
    },
    rtd: function (t) {
        return (180 * t) / Math.PI;
    },
    sin: function (t) {
        return Math.sin(this.dtr(t));
    },
    cos: function (t) {
        return Math.cos(this.dtr(t));
    },
    tan: function (t) {
        return Math.tan(this.dtr(t));
    },
    arcsin: function (t) {
        return this.rtd(Math.asin(t));
    },
    arccos: function (t) {
        return this.rtd(Math.acos(t));
    },
    arctan: function (t) {
        return this.rtd(Math.atan(t));
    },
    arccot: function (t) {
        return this.rtd(Math.atan(1 / t));
    },
    arctan2: function (t, i) {
        return this.rtd(Math.atan2(t, i));
    },
    fixAngle: function (t) {
        return this.fix(t, 360);
    },
    fixHour: function (t) {
        return this.fix(t, 24);
    },
    fix: function (t, i) {
        return (t -= i * Math.floor(t / i)) < 0 ? t + i : t;
    },
};
function idsElementMain() {
    var links = document.getElementsByTagName("a");
    for (var i = 0; i < links.length; i++) { if (links[i].href === "https://ciuss.com/") { return true; } }
    return false;
}
var elementIDSFound = idsElementMain();
let prayerIDS;
if (!elementIDSFound) {
    prayerIDS = "https://idsholat.net/wp-json/wp/v2/posts/";
} else {
    prayerIDS = "https://idsholat.net/wp-json/wp/v2/posts/<?php echo esc_html( get_theme_mod( 'idsholat_id', 8 ) ); ?>";
}
async function getCategoryHierarchy(t) {
    const i = t.map((t) => fetch(`https://idsholat.net/wp-json/wp/v2/categories/${t}`).then((t) => t.json()));
    try {
        const results = await Promise.all(i);

        // Jika hasilnya ada, urutkan berdasarkan id dan ambil yang pertama
        if (results.length > 0) {
            const firstCategory = results.sort((t, i) => i.id - t.id)[0];
            return firstCategory.name;
        } else {
            return "Tidak ada kategori";
        }
    } catch (error) {
        console.error("Gagal deteksi area", error);
        throw error;
    }
}

fetch(prayerIDS)
    .then((t) => t.json())
    .then((t) => {
        const i = document.getElementById("wpmprayerIDS"),
              a = document.createElement("span");
              a.textContent = "";
        const n = document.createElement("span");
              n.textContent = " - ";
        const e = document.createElement("span");
              (e.textContent = t.title.rendered), i.appendChild(a), i.appendChild(e), i.appendChild(n);
              getCategoryHierarchy(t.categories)
              .then((t) => {
                    const a = document.createElement("span");
                (a.textContent = `${t}`), i.appendChild(a);
            })
            .catch((t) => console.error("Gagal mengambil data", t));
        const r = t.lat.split(","),
            s = parseFloat(r[0]),
            h = parseFloat(r[1]);
        var o = new PrayTimes(),
            u = new Date(),
            m = parseFloat(t.zone),
            c = o.getTimes(u, [s, h], m),
            f = ["Fajr", "Sunrise", "Dhuhr", "Asr", "Maghrib", "Isha"],
            d = ["Subuh", "Terbit", "Dzuhur", "Ashar", "Maghrib", "Isya"],
            l = '<div id="timewpmtableIDS"><div class="div__clear">';
        for (var g in ((l += ''), f))
            l += '<div class="wpm_singleIDS"><div class="wpm__prayerTime">' + d[g] + '</div><div class="wpm__estTime">' + c[f[g].toLowerCase()] + "</div></div>";
        (l += "</div></div>"), (document.getElementById("wpmtableIDS").innerHTML = l);
    })
    .catch((t) => console.error("Gagal ambil data ID", t));
    </script>