<?php
        $ch = curl_init('https://favqs.com/api/');
        echo curl_exec($ch);
        curl_close($ch);