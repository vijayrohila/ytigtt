<?php

return [
    'serving_since' => env('CREATOR_LINK_SERVING_SINCE', '2026-05-04'),
    'min_view_seconds' => (int) env('CREATOR_LINK_MIN_VIEW_SECONDS', 10),
    'unlock_ttl_seconds' => (int) env('CREATOR_LINK_UNLOCK_TTL_SECONDS', 180),
];
