CREATE OR REPLACE VIEW `v_tramas_test` AS 
SELECT 
  `a`.`id` AS `id`,
  date_format(`a`.`recibido_at`, '%Y%m') AS `col_a`, 
  1 AS `col_b`, 
  12975 AS `col_c`, 
  12975 AS `col_d`,
  (
    case `a`.`estado_id` when 3 then 3 else 1 end
  ) AS `col_e`, 
  (
    case `a`.`estado_id` when 3 then `a`.`traslado_codigo` else '12975' end
  ) AS `col_f`, 
  (
    case `a`.`medio_recepcion_id` when (
      1 
      or 3
    ) then `a`.`medio_recepcion_id` else 2 end
  ) AS `col_g`, 
  concat('12975-', `a`.`hoja_nro`) AS `col_h`, 
  (
    case when (`b`.`dip_tp` = 'DNI') then 1 when (`b`.`dip_tp` = 'CDE') then 2 when (`b`.`dip_tp` = 'PASAPORTE') then 3 when (`b`.`dip_tp` = 'DIE') then 4 when (`b`.`dip_tp` = 'CUI') then 5 when (`b`.`dip_tp` = 'CNV') then 6 when (`b`.`dip_tp` = 'PTP') then 10 when (`b`.`dip_tp` = 'RUC') then 11 else 12 end
  ) AS `col_i`, 
  `b`.`dip` AS `col_j`, 
  (
    case when (`b`.`dip_tp` = 'RUC') then `b`.`name` end
  ) AS `col_k`, 
  (
    case when (`b`.`dip_tp` <> 'RUC') then `b`.`name` end
  ) AS `col_l`, 
  (
    case when (`c`.`dip_tp` = 'DNI') then 1 when (`c`.`dip_tp` = 'CDE') then 2 when (`c`.`dip_tp` = 'PASAPORTE') then 3 when (`c`.`dip_tp` = 'DIE') then 4 when (`c`.`dip_tp` = 'CUI') then 5 when (`c`.`dip_tp` = 'CNV') then 6 when (`c`.`dip_tp` = 'PTP') then 10 when (`c`.`dip_tp` = 'RUC') then 11 when (`c`.`dip_tp` = 'OTROS') then 12 else NULL end
  ) AS `col_o`, 
  `c`.`dip` AS `col_p`, 
  (
    case when (`c`.`dip_tp` = 'RUC') then `c`.`name` else NULL end
  ) AS `col_q`, 
  (
    case when (`c`.`dip_tp` <> 'RUC') then `c`.`name` else NULL end
  ) AS `col_r`, 
  (
    case when `a`.`send_mail` then 'Si' else 'No' end
  ) AS `col_u`, 
  (
    case when `a`.`send_mail` then `b`.`email` else NULL end
  ) AS `col_v`, 
  `b`.`domicilio` AS `col_w`, 
  `b`.`telefono` AS `col_x`, 
  `a`.`medio_recepcion_id` AS `col_y`, 
  date_format(`a`.`recibido_at`, '%Y%m%d') AS `col_z`, 
  `a`.`descripcion` AS `col_aa`, 
  (
    case when (`a`.`origen_id` = 18) then 1 when (`a`.`origen_id` = 12) then 2 when (`a`.`origen_id` = 13) then 3 when (`a`.`origen_id` = 21) then 4 when (`a`.`origen_id` = 0) then 5 when (`a`.`origen_id` = 24) then 6 when (`a`.`origen_id` = 14) then 7 when (`a`.`origen_id` = 0) then 8 when (`a`.`origen_id` = 25) then 9 when (`a`.`origen_id` = 0) then 10 when (`a`.`origen_id` = 0) then 11 when (`a`.`origen_id` = 0) then 12 when (`a`.`origen_id` = 0) then 13 else NULL end
  ) AS `col_ab`
FROM 
  (
    (
      `reclamos` `a` 
      join `users` `b` on(
        (`a`.`user_id` = `b`.`id`)
      )
    ) 
    left join `users` `c` on(
      (`a`.`user2_id` = `c`.`id`)
    )
  )
WHERE
  `a`.`delete_at` IS NULL
ORDER BY 
  `a`.`recibido_at` ASC;
