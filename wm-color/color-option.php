<?php

function wm_get_color_schemes() {
	
	return apply_filters(
		'wm_color_schemes',
		array(
			'default' => array(
				'label'  => __( 'Default', 'masjid' ),
				'colors' => array(
					'#ffffff', // 0 body
					'#555555', // 1 body color
					'#222222', // 2 body link
					'#7bae91', // 3 wm running bg
					'#ffffff', // 4 wm running col
					'#ffffff', // 5 wm running link
					'#ffffff', // 6 wm wm menu col
					'#333333', // 7 wm header col
					'#7bae91', // 8 wm header aksen
					'#ffffff', // 9 wm menu bg
					'#7bae91', // 10 wm menu col
					'#333333', // 11 wm menu hover
					'#7bae91', // 12 wm search bg
					'#ffffff', // 13 wm search col
					'#ffffff', // 14 wm info blok bg
					'#ffffff', // 15 wm info kotak bg
					'#333333', // 16 wm info kotak col
					'#7bae91', // 17 wm info kotak aksen
					'#7bae91', // 18 wm footer bg
					'#ffffff', // 19 wm footer col
					'#ffffff', // 20 wm footer link
					'#ffffff', // 21 widget agenda blok bg
					'#ffffff', // 22 widget agenda kotak bg
					'#333333', // 23 widget agenda col
					'#7bae91', // 24 widget agenda aksen
					'#7bae91', // 25 widget infaq bg
					'#ffffff', // 26 widget infaq table
					'#333333', // 27 widget infaq color
					'#7bae91', // 28 widget infaq aksen
					'#ffffff', // 29 widget dana bg
					'#333333', // 30 widget dana head
					'#555555', // 31 widget dana col
					'#ffffff', // 32 widget dana box
					'#333333', // 33 widget dana boc col
					'#7bae91', // 34 widget dana box aksen
					'#ffffff', // 35 widget petugas bg
					'#333333', // 36 widget petugas col
					'#7bae91', // 37 widget petugas aksen
					'#ffffff', // 38 widget jumat bg
					'#7bae91', // 39 widget jumat col
					'#333333', // 40 widget jumat aksen
					'#ffffff', // 41 widget tausiyah bg
					'#333333', // 42 widget tausiyah col
					'#7bae91', // 43 widget tausiyah aksen
					'#ffffff', // 44 widget layanan bg
					'#7bae91', // 45 widget layanan judul
					'#7bae91', // 46 widget layanan box bg
					'#ffffff', // 47 widget layanan box teks
					'#7bae91', // 48 widget lembaga bg
					'#ffffff', // 49 widget lembaga judul
					'#ffffff', // 50 widget lembaga box bg
					'#333333', // 51 widget lembaga box color
					'#ffffff', // 52 widget inventaris bg
					'#7bae91', // 53 widget inventaris col
					'#7bae91', // 54 widget inventaris aksen
					'#ffffff', // 55 widget perpus bg
					'#7bae91', // 56 widget perpus col
					'#333333', // 57 widget perpus aksen
					'#7bae91', // 58 SPECIAL GLOBAL AKSEN
					'#ffffff', // 59 widget galeri bg
					'#7bae91', // 60 widget galeri judul
					'#7bae91', // 61 widget video bg
					'#ffffff', // 62 widget video judul
				),
			),
			'khalifah' => array(
				'label'  => __( 'Khalifah (Default)', 'masjid' ),
				'colors' => array(
					'#ffffff', // 0 body
					'#555555', // 1 body color
					'#222222', // 2 body link
					'#1abdab', // 3 wm running bg
					'#ffffff', // 4 wm running col
					'#ffffff', // 5 wm running link
					'#ffffff', // 6 wm wm menu col
					'#333333', // 7 wm header col
					'#1abdab', // 8 wm header aksen
					'#ffffff', // 9 wm menu bg
					'#1abdab', // 10 wm menu col
					'#333333', // 11 wm menu hover
					'#1abdab', // 12 wm search bg
					'#ffffff', // 13 wm search col
					'#ffffff', // 14 wm info blok bg
					'#ffffff', // 15 wm info kotak bg
					'#333333', // 16 wm info kotak col
					'#1abdab', // 17 wm info kotak aksen
					'#1abdab', // 18 wm footer bg
					'#ffffff', // 19 wm footer col
					'#ffffff', // 20 wm footer link
					'#ffffff', // 21 widget agenda blok bg
					'#ffffff', // 22 widget agenda kotak bg
					'#333333', // 23 widget agenda col
					'#1abdab', // 24 widget agenda aksen
					'#1abdab', // 25 widget infaq bg
					'#ffffff', // 26 widget infaq table
					'#333333', // 27 widget infaq color
					'#1abdab', // 28 widget infaq aksen
					'#ffffff', // 29 widget dana bg
					'#333333', // 30 widget dana head
					'#555555', // 31 widget dana col
					'#ffffff', // 32 widget dana box
					'#333333', // 33 widget dana boc col
					'#1abdab', // 34 widget dana box aksen
					'#ffffff', // 35 widget petugas bg
					'#333333', // 36 widget petugas col
					'#1abdab', // 37 widget petugas aksen
					'#ffffff', // 38 widget jumat bg
					'#1abdab', // 39 widget jumat col
					'#333333', // 40 widget jumat aksen
					'#ffffff', // 41 widget tausiyah bg
					'#333333', // 42 widget tausiyah col
					'#1abdab', // 43 widget tausiyah aksen
					'#ffffff', // 44 widget layanan bg
					'#1abdab', // 45 widget layanan judul
					'#1abdab', // 46 widget layanan box bg
					'#ffffff', // 47 widget layanan box teks
					'#1abdab', // 48 widget lembaga bg
					'#ffffff', // 49 widget lembaga judul
					'#ffffff', // 50 widget lembaga box bg
					'#333333', // 51 widget lembaga box color
					'#ffffff', // 52 widget inventaris bg
					'#1abdab', // 53 widget inventaris col
					'#1abdab', // 54 widget inventaris aksen
					'#ffffff', // 55 widget perpus bg
					'#1abdab', // 56 widget perpus col
					'#333333', // 57 widget perpus aksen
					'#1abdab', // 58 SPECIAL GLOBAL AKSEN
					'#ffffff', // 59 widget galeri bg
					'#1abdab', // 60 widget galeri judul
					'#1abdab', // 61 widget video bg
					'#ffffff', // 62 widget video judul
				),
			),
			'classic' => array(
				'label'  => __( 'Classic', 'masjid' ),
				'colors' => array(
					'#ffffff', // 0 body
					'#555555', // 1 body color
					'#7bae91', // 2 body link
					'#7bae91', // 3 wm running bg
					'#ffffff', // 4 wm running col
					'#ffffff', // 5 wm running link
					'#7bae91', // 6 wm wm menu col
					'#ffffff', // 7 wm header col
					'#ffffff', // 8 wm header aksen
					'#333333', // 9 wm menu bg
					'#ffffff', // 10 wm menu col
					'#7bae91', // 11 wm menu hover
					'#ffffff', // 12 wm search bg
					'#333333', // 13 wm search col
					'#ffffff', // 14 wm info blok bg
					'#7bae91', // 15 wm info kotak bg
					'#ffffff', // 16 wm info kotak col
					'#ffffff', // 17 wm info kotak aksen
					'#7bae91', // 18 wm footer bg
					'#ffffff', // 19 wm footer col
					'#ffffff', // 20 wm footer link
					'#ffffff', // 21 widget agenda blok bg
					'#ffffff', // 22 widget agenda kotak bg
					'#333333', // 23 widget agenda col
					'#7bae91', // 24 widget agenda aksen
					'#7bae91', // 25 widget infaq bg
					'#ffffff', // 26 widget infaq table
					'#333333', // 27 widget infaq color
					'#7bae91', // 28 widget infaq aksen
					'#ffffff', // 29 widget dana bg
					'#333333', // 30 widget dana head
					'#555555', // 31 widget dana col
					'#ffffff', // 32 widget dana box
					'#333333', // 33 widget dana boc col
					'#7bae91', // 34 widget dana box aksen
					'#ffffff', // 35 widget petugas bg
					'#333333', // 36 widget petugas col
					'#7bae91', // 37 widget petugas aksen
					'#ffffff', // 38 widget jumat bg
					'#7bae91', // 39 widget jumat col
					'#333333', // 40 widget jumat aksen
					'#ffffff', // 41 widget tausiyah bg
					'#333333', // 42 widget tausiyah col
					'#7bae91', // 43 widget tausiyah aksen
					'#ffffff', // 44 widget layanan bg
					'#7bae91', // 45 widget layanan judul
					'#7bae91', // 46 widget layanan box bg
					'#ffffff', // 47 widget layanan box teks
					'#7bae91', // 48 widget lembaga bg
					'#ffffff', // 49 widget lembaga judul
					'#ffffff', // 50 widget lembaga box bg
					'#333333', // 51 widget lembaga box color
					'#ffffff', // 52 widget inventaris bg
					'#7bae91', // 53 widget inventaris col
					'#7bae91', // 54 widget inventaris aksen
					'#ffffff', // 55 widget perpus bg
					'#7bae91', // 56 widget perpus col
					'#333333', // 57 widget perpus aksen
					'#7bae91', // 58 SPECIAL GLOBAL AKSEN
					'#ffffff', // 59 widget galeri bg
					'#7bae91', // 60 widget galeri judul
					'#7bae91', // 61 widget video bg
					'#ffffff', // 62 widget video judul
				),
			),
			'green' => array(
				'label'  => __( 'Green', 'masjid' ),
				'colors' => array(
					'#ffffff', // 0 body
					'#555555', // 1 body color
					'#222222', // 2 body link
					'#37a664', // 3 wm running bg
					'#ffffff', // 4 wm running col
					'#ffffff', // 5 wm running link
					'#ffffff', // 6 wm wm menu col
					'#333333', // 7 wm header col
					'#37a664', // 8 wm header aksen
					'#ffffff', // 9 wm menu bg
					'#37a664', // 10 wm menu col
					'#333333', // 11 wm menu hover
					'#37a664', // 12 wm search bg
					'#ffffff', // 13 wm search col
					'#ffffff', // 14 wm info blok bg
					'#ffffff', // 15 wm info kotak bg
					'#333333', // 16 wm info kotak col
					'#37a664', // 17 wm info kotak aksen
					'#37a664', // 18 wm footer bg
					'#ffffff', // 19 wm footer col
					'#ffffff', // 20 wm footer link
					'#ffffff', // 21 widget agenda blok bg
					'#ffffff', // 22 widget agenda kotak bg
					'#333333', // 23 widget agenda col
					'#37a664', // 24 widget agenda aksen
					'#37a664', // 25 widget infaq bg
					'#ffffff', // 26 widget infaq table
					'#333333', // 27 widget infaq color
					'#37a664', // 28 widget infaq aksen
					'#ffffff', // 29 widget dana bg
					'#333333', // 30 widget dana head
					'#555555', // 31 widget dana col
					'#ffffff', // 32 widget dana box
					'#333333', // 33 widget dana boc col
					'#37a664', // 34 widget dana box aksen
					'#ffffff', // 35 widget petugas bg
					'#333333', // 36 widget petugas col
					'#37a664', // 37 widget petugas aksen
					'#ffffff', // 38 widget jumat bg
					'#37a664', // 39 widget jumat col
					'#333333', // 40 widget jumat aksen
					'#ffffff', // 41 widget tausiyah bg
					'#333333', // 42 widget tausiyah col
					'#37a664', // 43 widget tausiyah aksen
					'#ffffff', // 44 widget layanan bg
					'#37a664', // 45 widget layanan judul
					'#37a664', // 46 widget layanan box bg
					'#ffffff', // 47 widget layanan box teks
					'#37a664', // 48 widget lembaga bg
					'#ffffff', // 49 widget lembaga judul
					'#ffffff', // 50 widget lembaga box bg
					'#333333', // 51 widget lembaga box color
					'#ffffff', // 52 widget inventaris bg
					'#37a664', // 53 widget inventaris col
					'#37a664', // 54 widget inventaris aksen
					'#ffffff', // 55 widget perpus bg
					'#37a664', // 56 widget perpus col
					'#333333', // 57 widget perpus aksen
					'#37a664', // 58 SPECIAL GLOBAL AKSEN
					'#ffffff', // 59 widget galeri bg
					'#37a664', // 60 widget galeri judul
					'#37a664', // 61 widget video bg
					'#ffffff', // 62 widget video judul
				),
			),
			'blue' => array(
				'label'  => __( 'Blue', 'masjid' ),
				'colors' => array(
					'#ffffff', // 0 body
					'#555555', // 1 body color
					'#222222', // 2 body link
					'#0132fc', // 3 wm running bg
					'#ffffff', // 4 wm running col
					'#ffffff', // 5 wm running link
					'#ffffff', // 6 wm wm menu col
					'#333333', // 7 wm header col
					'#0132fc', // 8 wm header aksen
					'#ffffff', // 9 wm menu bg
					'#0132fc', // 10 wm menu col
					'#333333', // 11 wm menu hover
					'#0132fc', // 12 wm search bg
					'#ffffff', // 13 wm search col
					'#ffffff', // 14 wm info blok bg
					'#ffffff', // 15 wm info kotak bg
					'#333333', // 16 wm info kotak col
					'#0132fc', // 17 wm info kotak aksen
					'#0132fc', // 18 wm footer bg
					'#ffffff', // 19 wm footer col
					'#ffffff', // 20 wm footer link
					'#ffffff', // 21 widget agenda blok bg
					'#ffffff', // 22 widget agenda kotak bg
					'#333333', // 23 widget agenda col
					'#0132fc', // 24 widget agenda aksen
					'#0132fc', // 25 widget infaq bg
					'#ffffff', // 26 widget infaq table
					'#333333', // 27 widget infaq color
					'#0132fc', // 28 widget infaq aksen
					'#ffffff', // 29 widget dana bg
					'#333333', // 30 widget dana head
					'#555555', // 31 widget dana col
					'#ffffff', // 32 widget dana box
					'#333333', // 33 widget dana boc col
					'#0132fc', // 34 widget dana box aksen
					'#ffffff', // 35 widget petugas bg
					'#333333', // 36 widget petugas col
					'#0132fc', // 37 widget petugas aksen
					'#ffffff', // 38 widget jumat bg
					'#0132fc', // 39 widget jumat col
					'#333333', // 40 widget jumat aksen
					'#ffffff', // 41 widget tausiyah bg
					'#333333', // 42 widget tausiyah col
					'#0132fc', // 43 widget tausiyah aksen
					'#ffffff', // 44 widget layanan bg
					'#0132fc', // 45 widget layanan judul
					'#0132fc', // 46 widget layanan box bg
					'#ffffff', // 47 widget layanan box teks
					'#0132fc', // 48 widget lembaga bg
					'#ffffff', // 49 widget lembaga judul
					'#ffffff', // 50 widget lembaga box bg
					'#333333', // 51 widget lembaga box color
					'#ffffff', // 52 widget inventaris bg
					'#0132fc', // 53 widget inventaris col
					'#0132fc', // 54 widget inventaris aksen
					'#ffffff', // 55 widget perpus bg
					'#0132fc', // 56 widget perpus col
					'#333333', // 57 widget perpus aksen
					'#0132fc', // 58 SPECIAL GLOBAL AKSEN
					'#ffffff', // 59 widget galeri bg
					'#0132fc', // 60 widget galeri judul
					'#0132fc', // 61 widget video bg
					'#ffffff', // 62 widget video judul
				),
			),
			'red' => array(
				'label'  => __( 'Red', 'masjid' ),
				'colors' => array(
					'#ffffff', // 0 body
					'#555555', // 1 body color
					'#222222', // 2 body link
					'#DC143C', // 3 wm running bg
					'#ffffff', // 4 wm running col
					'#ffffff', // 5 wm running link
					'#ffffff', // 6 wm wm menu col
					'#333333', // 7 wm header col
					'#DC143C', // 8 wm header aksen
					'#ffffff', // 9 wm menu bg
					'#DC143C', // 10 wm menu col
					'#333333', // 11 wm menu hover
					'#DC143C', // 12 wm search bg
					'#ffffff', // 13 wm search col
					'#ffffff', // 14 wm info blok bg
					'#ffffff', // 15 wm info kotak bg
					'#333333', // 16 wm info kotak col
					'#DC143C', // 17 wm info kotak aksen
					'#DC143C', // 18 wm footer bg
					'#ffffff', // 19 wm footer col
					'#ffffff', // 20 wm footer link
					'#ffffff', // 21 widget agenda blok bg
					'#ffffff', // 22 widget agenda kotak bg
					'#333333', // 23 widget agenda col
					'#DC143C', // 24 widget agenda aksen
					'#DC143C', // 25 widget infaq bg
					'#ffffff', // 26 widget infaq table
					'#333333', // 27 widget infaq color
					'#DC143C', // 28 widget infaq aksen
					'#ffffff', // 29 widget dana bg
					'#333333', // 30 widget dana head
					'#555555', // 31 widget dana col
					'#ffffff', // 32 widget dana box
					'#333333', // 33 widget dana boc col
					'#DC143C', // 34 widget dana box aksen
					'#ffffff', // 35 widget petugas bg
					'#333333', // 36 widget petugas col
					'#DC143C', // 37 widget petugas aksen
					'#ffffff', // 38 widget jumat bg
					'#DC143C', // 39 widget jumat col
					'#333333', // 40 widget jumat aksen
					'#ffffff', // 41 widget tausiyah bg
					'#333333', // 42 widget tausiyah col
					'#DC143C', // 43 widget tausiyah aksen
					'#ffffff', // 44 widget layanan bg
					'#DC143C', // 45 widget layanan judul
					'#DC143C', // 46 widget layanan box bg
					'#ffffff', // 47 widget layanan box teks
					'#DC143C', // 48 widget lembaga bg
					'#ffffff', // 49 widget lembaga judul
					'#ffffff', // 50 widget lembaga box bg
					'#333333', // 51 widget lembaga box color
					'#ffffff', // 52 widget inventaris bg
					'#DC143C', // 53 widget inventaris col
					'#DC143C', // 54 widget inventaris aksen
					'#ffffff', // 55 widget perpus bg
					'#DC143C', // 56 widget perpus col
					'#333333', // 57 widget perpus aksen
					'#DC143C', // 58 SPECIAL GLOBAL AKSEN
					'#ffffff', // 59 widget galeri bg
					'#333333', // 60 widget galeri judul
					'#333333', // 61 widget video bg
					'#ffffff', // 62 widget video judul
				),
			),
			'donker' => array(
				'label'  => __( 'Blue Donker', 'masjid' ),
				'colors' => array(
					'#ffffff', // 0 body
					'#555555', // 1 body color
					'#222222', // 2 body link
					'#001188', // 3 wm running bg
					'#ffffff', // 4 wm running col
					'#ffffff', // 5 wm running link
					'#ffffff', // 6 wm wm menu col
					'#333333', // 7 wm header col
					'#001188', // 8 wm header aksen
					'#ffffff', // 9 wm menu bg
					'#001188', // 10 wm menu col
					'#333333', // 11 wm menu hover
					'#001188', // 12 wm search bg
					'#ffffff', // 13 wm search col
					'#ffffff', // 14 wm info blok bg
					'#ffffff', // 15 wm info kotak bg
					'#333333', // 16 wm info kotak col
					'#001188', // 17 wm info kotak aksen
					'#001188', // 18 wm footer bg
					'#ffffff', // 19 wm footer col
					'#ffffff', // 20 wm footer link
					'#ffffff', // 21 widget agenda blok bg
					'#ffffff', // 22 widget agenda kotak bg
					'#333333', // 23 widget agenda col
					'#001188', // 24 widget agenda aksen
					'#001188', // 25 widget infaq bg
					'#ffffff', // 26 widget infaq table
					'#333333', // 27 widget infaq color
					'#001188', // 28 widget infaq aksen
					'#ffffff', // 29 widget dana bg
					'#333333', // 30 widget dana head
					'#555555', // 31 widget dana col
					'#ffffff', // 32 widget dana box
					'#333333', // 33 widget dana boc col
					'#001188', // 34 widget dana box aksen
					'#ffffff', // 35 widget petugas bg
					'#333333', // 36 widget petugas col
					'#001188', // 37 widget petugas aksen
					'#ffffff', // 38 widget jumat bg
					'#001188', // 39 widget jumat col
					'#333333', // 40 widget jumat aksen
					'#ffffff', // 41 widget tausiyah bg
					'#333333', // 42 widget tausiyah col
					'#001188', // 43 widget tausiyah aksen
					'#ffffff', // 44 widget layanan bg
					'#001188', // 45 widget layanan judul
					'#001188', // 46 widget layanan box bg
					'#ffffff', // 47 widget layanan box teks
					'#001188', // 48 widget lembaga bg
					'#ffffff', // 49 widget lembaga judul
					'#ffffff', // 50 widget lembaga box bg
					'#333333', // 51 widget lembaga box color
					'#ffffff', // 52 widget inventaris bg
					'#001188', // 53 widget inventaris col
					'#001188', // 54 widget inventaris aksen
					'#ffffff', // 55 widget perpus bg
					'#001188', // 56 widget perpus col
					'#333333', // 57 widget perpus aksen
					'#001188', // 58 SPECIAL GLOBAL AKSEN
					'#ffffff', // 59 widget galeri bg
					'#001188', // 60 widget galeri judul
					'#001188', // 61 widget video bg
					'#ffffff', // 62 widget video judul
				),
			),
			'orange' => array(
				'label'  => __( 'Orange', 'masjid' ),
				'colors' => array(
					'#ffffff', // 0 body
					'#555555', // 1 body color
					'#222222', // 2 body link
					'#FF7F50', // 3 wm running bg
					'#ffffff', // 4 wm running col
					'#ffffff', // 5 wm running link
					'#ffffff', // 6 wm wm menu col
					'#333333', // 7 wm header col
					'#FF7F50', // 8 wm header aksen
					'#ffffff', // 9 wm menu bg
					'#FF7F50', // 10 wm menu col
					'#333333', // 11 wm menu hover
					'#FF7F50', // 12 wm search bg
					'#ffffff', // 13 wm search col
					'#ffffff', // 14 wm info blok bg
					'#ffffff', // 15 wm info kotak bg
					'#333333', // 16 wm info kotak col
					'#FF7F50', // 17 wm info kotak aksen
					'#FF7F50', // 18 wm footer bg
					'#ffffff', // 19 wm footer col
					'#ffffff', // 20 wm footer link
					'#ffffff', // 21 widget agenda blok bg
					'#ffffff', // 22 widget agenda kotak bg
					'#333333', // 23 widget agenda col
					'#FF7F50', // 24 widget agenda aksen
					'#FF7F50', // 25 widget infaq bg
					'#ffffff', // 26 widget infaq table
					'#333333', // 27 widget infaq color
					'#FF7F50', // 28 widget infaq aksen
					'#ffffff', // 29 widget dana bg
					'#333333', // 30 widget dana head
					'#555555', // 31 widget dana col
					'#ffffff', // 32 widget dana box
					'#333333', // 33 widget dana boc col
					'#FF7F50', // 34 widget dana box aksen
					'#ffffff', // 35 widget petugas bg
					'#333333', // 36 widget petugas col
					'#FF7F50', // 37 widget petugas aksen
					'#ffffff', // 38 widget jumat bg
					'#FF7F50', // 39 widget jumat col
					'#333333', // 40 widget jumat aksen
					'#ffffff', // 41 widget tausiyah bg
					'#333333', // 42 widget tausiyah col
					'#FF7F50', // 43 widget tausiyah aksen
					'#ffffff', // 44 widget layanan bg
					'#FF7F50', // 45 widget layanan judul
					'#FF7F50', // 46 widget layanan box bg
					'#ffffff', // 47 widget layanan box teks
					'#FF7F50', // 48 widget lembaga bg
					'#ffffff', // 49 widget lembaga judul
					'#ffffff', // 50 widget lembaga box bg
					'#333333', // 51 widget lembaga box color
					'#ffffff', // 52 widget inventaris bg
					'#FF7F50', // 53 widget inventaris col
					'#FF7F50', // 54 widget inventaris aksen
					'#ffffff', // 55 widget perpus bg
					'#FF7F50', // 56 widget perpus col
					'#333333', // 57 widget perpus aksen
					'#FF7F50', // 58 SPECIAL GLOBAL AKSEN
					'#ffffff', // 59 widget galeri bg
					'#333333', // 60 widget galeri judul
					'#333333', // 61 widget video bg
					'#ffffff', // 62 widget video judul
				),
			),
			'redwhite' => array(
				'label'  => __( 'Hybrid 1', 'masjid' ),
				'colors' => array(
					'#ffffff', // 0 body
					'#555555', // 1 body color
					'#222222', // 2 body link
					'#dd3333', // 3 wm running bg
					'#ffffff', // 4 wm running col
					'#ffffff', // 5 wm running link
					'#ffffff', // 6 wm wm menu col
					'#333333', // 7 wm header col
					'#dd3333', // 8 wm header aksen
					'#222222', // 9 wm menu bg
					'#ffffff', // 10 wm menu col
					'#ffffff', // 11 wm menu hover
					'#dd3333', // 12 wm search bg
					'#ffffff', // 13 wm search col
					'#ffffff', // 14 wm info blok bg
					'#dd3333', // 15 wm info kotak bg
					'#ffffff', // 16 wm info kotak col
					'#ffffff', // 17 wm info kotak aksen
					'#222222', // 18 wm footer bg
					'#ffffff', // 19 wm footer col
					'#ffffff', // 20 wm footer link
					'#ffffff', // 21 widget agenda blok bg
					'#ffffff', // 22 widget agenda kotak bg
					'#333333', // 23 widget agenda col
					'#333333', // 24 widget agenda aksen
					'#222222', // 25 widget infaq bg
					'#ffffff', // 26 widget infaq table
					'#333333', // 27 widget infaq color
					'#dd3333', // 28 widget infaq aksen
					'#222222', // 29 widget dana bg
					'#ffffff', // 30 widget dana head
					'#dddddd', // 31 widget dana col
					'#ffffff', // 32 widget dana box
					'#333333', // 33 widget dana boc col
					'#dd3333', // 34 widget dana box aksen
					'#ffffff', // 35 widget petugas bg
					'#333333', // 36 widget petugas col
					'#dd3333', // 37 widget petugas aksen
					'#ffffff', // 38 widget jumat bg
					'#dd3333', // 39 widget jumat col
					'#333333', // 40 widget jumat aksen
					'#ffffff', // 41 widget tausiyah bg
					'#333333', // 42 widget tausiyah col
					'#dd3333', // 43 widget tausiyah aksen
					'#ffffff', // 44 widget layanan bg
					'#333333', // 45 widget layanan judul
					'#333333', // 46 widget layanan box bg
					'#ffffff', // 47 widget layanan box teks
					'#ffffff', // 48 widget lembaga bg
					'#333333', // 49 widget lembaga judul
					'#dd3333', // 50 widget lembaga box bg
					'#ffffff', // 51 widget lembaga box color
					'#ffffff', // 52 widget inventaris bg
					'#222222', // 53 widget inventaris col
					'#dd3333', // 54 widget inventaris aksen
					'#ffffff', // 55 widget perpus bg
					'#dd3333', // 56 widget perpus col
					'#333333', // 57 widget perpus aksen
					'#dd3333', // 58 SPECIAL GLOBAL AKSEN
					'#ffffff', // 59 widget galeri bg
					'#333333', // 60 widget galeri judul
					'#333333', // 61 widget video bg
					'#ffffff', // 62 widget video judul
				),
			),
			'whitegreen' => array(
				'label'  => __( 'Hybrid 2', 'masjid' ),
				'colors' => array(
					'#ffffff', // 0 body
					'#555555', // 1 body color
					'#222222', // 2 body link
					'#ffffff', // 3 wm running bg
					'#555555', // 4 wm running col
					'#3CB371', // 5 wm running link
					'#ffffff', // 6 wm wm menu col
					'#333333', // 7 wm header col
					'#3CB371', // 8 wm header aksen
					'#3CB371', // 9 wm menu bg
					'#ffffff', // 10 wm menu col
					'#dddddd', // 11 wm menu hover
					'#ffffff', // 12 wm search bg
					'#333333', // 13 wm search col
					'#ffffff', // 14 wm info blok bg
					'#3CB371', // 15 wm info kotak bg
					'#ffffff', // 16 wm info kotak col
					'#ffffff', // 17 wm info kotak aksen
					'#222222', // 18 wm footer bg
					'#ffffff', // 19 wm footer col
					'#ffffff', // 20 wm footer link
					'#ffffff', // 21 widget agenda blok bg
					'#ffffff', // 22 widget agenda kotak bg
					'#333333', // 23 widget agenda col
					'#333333', // 24 widget agenda aksen
					'#222222', // 25 widget infaq bg
					'#ffffff', // 26 widget infaq table
					'#333333', // 27 widget infaq color
					'#3CB371', // 28 widget infaq aksen
					'#3CB371', // 29 widget dana bg
					'#ffffff', // 30 widget dana head
					'#ffffff', // 31 widget dana col
					'#ffffff', // 32 widget dana box
					'#333333', // 33 widget dana boc col
					'#3CB371', // 34 widget dana box aksen
					'#ffffff', // 35 widget petugas bg
					'#333333', // 36 widget petugas col
					'#3CB371', // 37 widget petugas aksen
					'#ffffff', // 38 widget jumat bg
					'#3CB371', // 39 widget jumat col
					'#333333', // 40 widget jumat aksen
					'#ffffff', // 41 widget tausiyah bg
					'#333333', // 42 widget tausiyah col
					'#3CB371', // 43 widget tausiyah aksen
					'#ffffff', // 44 widget layanan bg
					'#3CB371', // 45 widget layanan judul
					'#ffffff', // 46 widget layanan box bg
					'#333333', // 47 widget layanan box teks
					'#ffffff', // 48 widget lembaga bg
					'#3CB371', // 49 widget lembaga judul
					'#ffffff', // 50 widget lembaga box bg
					'#333333', // 51 widget lembaga box color
					'#ffffff', // 52 widget inventaris bg
					'#3CB371', // 53 widget inventaris col
					'#3CB371', // 54 widget inventaris aksen
					'#ffffff', // 55 widget perpus bg
					'#3CB371', // 56 widget perpus col
					'#333333', // 57 widget perpus aksen
					'#3CB371', // 58 SPECIAL GLOBAL AKSEN
					'#ffffff', // 59 widget galeri bg
					'#3CB371', // 60 widget galeri judul
					'#3CB371', // 61 widget video bg
					'#ffffff', // 62 widget video judul
				),
			),
		)
	);
}
