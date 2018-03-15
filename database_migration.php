<?php

// added by chirag

CREATE TABLE `sub_products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `training_progress_report` (
  `id` int(11) NOT NULL,
  `product_line_code_hr` varchar(100) DEFAULT NULL,
  `subproduct_id` int(11) DEFAULT '0',
  `alias` varchar(100) DEFAULT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `gin` varchar(100) DEFAULT NULL,
  `grade` varchar(100) DEFAULT NULL,
  `month_of_no_training` varchar(100) DEFAULT NULL,
  `month_in_step` varchar(100) DEFAULT NULL,
  `country_assn` varchar(100) DEFAULT NULL,
  `city_assn` varchar(100) DEFAULT NULL,
  `job` varchar(100) DEFAULT NULL,
  `job_code` varchar(100) DEFAULT NULL,
  `hr_org_unit` varchar(100) DEFAULT NULL,
  `delay` varchar(100) DEFAULT NULL,
  `step1` varchar(100) DEFAULT NULL,
  `step2` varchar(100) DEFAULT NULL,
  `step3` varchar(100) DEFAULT NULL,
  `step4` varchar(100) DEFAULT NULL,
  `indivisual_global_training_progress` varchar(100) DEFAULT NULL,
  `indivisual_expected_global_training_progress` varchar(100) DEFAULT NULL,
  `expected_against_actual` varchar(100) DEFAULT NULL,
  `indivisual_fst_progress` varchar(100) DEFAULT NULL,
  `indivisual_expected_fst_progress` varchar(100) DEFAULT NULL,
  `available_fixed_step_months` varchar(100) DEFAULT NULL,
  `training_start_date` date DEFAULT NULL,
  `area_region` varchar(100) DEFAULT NULL,
  `geo_market_code` varchar(100) DEFAULT NULL,
  `manager_last_name` varchar(100) DEFAULT NULL,
  `manager_first_name` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `job_function` varchar(100) DEFAULT NULL,
  `seniority_months` varchar(100) DEFAULT NULL,
  `position_flag` varchar(100) DEFAULT NULL,
  `month_step` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `sub_products`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `training_progress_report`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `sub_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;


ALTER TABLE `training_progress_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3385;