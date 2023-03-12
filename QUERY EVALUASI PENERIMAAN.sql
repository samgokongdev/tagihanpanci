DROP TABLE IF EXISTS evaluasi_penerimaan;
CREATE TABLE evaluasi_penerimaan AS 

SELECT
	a.*,
	b.np2,
	b.no_dok,
	b.tanggal_skp, 
	c.spv,
	c.kt,
	c.ang1,
	c.ang2,
	c.k1,
	c.k2,
	c.k3
FROM
	`penerimaan` AS A
left join 
	skp as b
left join 
	manualfpps as c
	on b.np2 = c.np2
	on a.NOMOR_KETETAPAN = B.nomor_ket
where YEAR(a.TANGGAL_BAYAR) = 2023 and a.NOMOR_KETETAPAN != "" and b.np2 is not null