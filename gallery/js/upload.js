/*************************
  Coppermine Photo Gallery
  ************************
  Copyright (c) 2003-2017 Coppermine Dev Team
  v1.0 originally written by Gregory Demar

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License version 3
  as published by the Free Software Foundation.

  ********************************************
  Coppermine version: 1.5.46
  $HeadURL: https://svn.code.sf.net/p/coppermine/code/trunk/cpg1.5.x/js/upload.js $
  $Revision: 8873 $
**********************************************/

$(document).ready(function() {
    button_enabled_style = '.browse { font-family: Arial,Helvetica,sans-serif;}';
    button_disabled_style = '.browse { font-family: Arial,Helvetica,sans-serif;}';

    $('#uploadMethod').change(function() {
        var param = 'method=' + $(this).val();
        if ($("select[name='album']").val()) {
            param += '&album=' + $("select[name='album']").val();
        }
        window.location.href = 'upload.php?' + param;
    });
});