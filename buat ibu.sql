SELECT
	spv1 as SUPERVISOR,
	kt1 as KETUA_TIM,
	np2 as NP2,
	nama_wp AS NAMA_WP,
	kode_rik as KODE,
	periode_1 as PERIODE_1,
	periode_2 AS PERIODE_2,
	sp2 AS SP2,
	tgl_sp2 AS TGL_SP2,
	tgl_sppl AS TGL_SPPL,
	target_sphp_idtp AS KOMITMEN,
	rekomitmen as REKOMITMEN,
	case
		WHEN sphp is null then "BELUM SPHP"
		WHEN tgl_sphp < target_sphp_idtp then "SPHP TERBIT SESUAI KOMITMEN"
		WHEN tgl_sphp > target_sphp_idtp then "SPHP TERBIT TIDAK SESUAI KOMITMEN"
		WHEN target_sphp_idtp is null then "BELUM ADA KOMITMEN"
	end as KETERANGAN
	
FROM
	`vtunggakans` 
WHERE
	spv1 IS NOT NULL