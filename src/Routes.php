<?php

Route::get('timezones/{timezone?}', 
  'ngiasim\aramex\TimezonesController@index');