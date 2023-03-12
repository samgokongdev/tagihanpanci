select 
a.id_spt as ID_BPS,
a.no_bps as NO_BPS,
a.npwp as NPWP,
a.nama as NAMA_WP,
a.kode_alias as JENIS_SPT,
a.ket as KETERANGAN_SPT,
a.masa as MASA,
a.tahun as TAHUN,
a.tgl_terima as TGL_TERIMA,
a.tgl_jt_rik as JATUH_TEMPO,
case
	when a.np2 != "" then a.np2
	when a.np2_lhp != "" then a.np2_lhp
	when b.np2 != "" then b.np2
	else null
end as NP2,
case
	when a.lhp is not null then "LHP"
	when a.sphp != "" then "SPHP"
	when a.sp2 != "" then "SP2"
	when a.np2 != "" then "NP2"
	when b.np2 != "" then "ADA TINDAKAN PEMERIKSAAN DENGAN CATATAN"
	else null
end AS PROGRESS_PEMERIKSAAN,
case
	when a.lhp is not null then a.lhp
	when a.sphp != "" then a.sphp
	when a.sp2 !="" then a.sp2
	when a.np2 is not null then null
	when b.np2 != "" then b.catatan
	else null
end AS KETERANGAN
from
(select 
a.*,
d.nama,
c.np2,
c.tgl_np2,
c.sp2,
c.tgl_sp2,
c.sphp,
c.tgl_sphp,
b.np2 as np2_lhp,
b.lhp,
b.tgl_lhp,
case
	when b.lhp != "" or c.sp2 != "" or c.np2 != "" then TRUE
	else FALSE
end as status_pemeriksaan

from
(SELECT
	* 
FROM
	`spt_clean` 
WHERE
	tgl_terima BETWEEN CURDATE() - INTERVAL 1 YEAR AND CURDATE()
	AND ket like '%Restitusi%' 
	
union all

SELECT
	* 
FROM
	`spt_clean` 
WHERE
	tgl_terima BETWEEN CURDATE() - INTERVAL 1 YEAR AND CURDATE()
	AND ket like '%Kompensasi%' and kode_alias = 'TAHUNAN' 
) AS a
left join lhp as b
on a.id_spt = b.id_spt
left join vtunggakans as c
on a.id_spt = c.id_spt 
left join mfwp_clean as d
on a.npwp = d.npwp 
)as a
left join catatanspts as b
on a.id_spt = b.id_spt
order by a.tgl_jt_rik asc