<?php
/*
WPGA, Google Analytics plugin for Wordpress.
Copyright (C) 2016  Daniel Oom

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

defined('ABSPATH') or die();
?>
<div class="wrap">
  <h1>WPGA</h1>
  <p>Setup your Google Analytics tracking id here, or leave it empty to disable the plugin.</p>
  <form name="wpga-form" method="post" action="">
    <table class="form-table">
      <tr>
        <th scope="row" width="33%"><label for="wpga-tracking-id">Google Analytics Tracking ID</label></th>
        <td><input type="text" id="wpga-tracking-id" name="wpga-tracking-id" value="<?php echo $tracking_id; ?>" /></td>
      </tr>
    </table>
    <p class="submit">
      <input type="submit" name="wpga-submit" class="button-primary" value="Save Changes" />
    </p>
  </form>
</div>
