<?php
// Query untuk search, function e keri sek ya hehe :pack
/* 	(
**		SELECT
**			nm_hotel,
**			deskripsi,
**			'hotel' AS type
**		FROM
**			tb_hotel
**		WHERE
**			nm_hotel LIKE '%a%'
**		OR deskripsi LIKE '%a%'
**		AND id_provinsi = 'PRO040816000001'
**		AND id_kota = 'KOT040816000001'
** 	)
** 	UNION
**	(
**		SELECT
**			a.nm_kamar,
**			a.deskripsi,
**			'kamar' AS type
**		FROM
**			tb_kamar a,
**			tb_hotel b
**		WHERE
**			a.nm_kamar LIKE '%a%'
**		OR a.deskripsi LIKE '%a%'
**		AND b.id_hotel = a.id_hotel
**		AND b.id_provinsi = 'PRO040816000001'
**		AND b.id_kota = 'KOT040816000001'
**	)
*/