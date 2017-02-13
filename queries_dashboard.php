<?php

// Get nb of pending jobs
$query_get_pending_jobs_text = '
    SELECT  count(id_job) as result
    FROM    job_queue_product_article
    WHERE   status = \'pending\'
';

$query_get_all_jobs_text = '
    SELECT  count(id_job) as result
    FROM    job_queue_product_article
';