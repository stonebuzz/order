<?php
/*
 -------------------------------------------------------------------------
 More categories plugin for GLPI
 Copyright (C) 2003-2011 by the  More categories Development Team.
 -------------------------------------------------------------------------

 LICENSE

 This file is part of  More categories.

  More categories is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

  More categories is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with  More categories. If not, see <http://www.gnu.org/licenses/>.
 --------------------------------------------------------------------------
 */


class PluginOrderAccountingSection extends CommonDropdown {


   //Name of this element
   static function getTypeName($nb = 0) {
      return __("Accounting Section ", "order");
   }

   //define some option for search this element
   function getSearchOptions() {

      $tab = array();

      $tab['common']          = __('Characteristics');

      $tab[1]['table']     = 'glpi_plugin_order_accountingsection';
      $tab[1]['field']     = 'name';
      $tab[1]['datatype']  = 'itemlink';
      $tab[1]['name']      = __('Name');

      $tab[2]['table']     = 'glpi_plugin_order_accountingsection';
      $tab[2]['field']     = 'id';
      $tab[2]['datatype']  = 'itemlink';
      $tab[2]['name']      = __('ID');

      return $tab;
   }



   //define form to add / update thie selement
   public function showForm($ID, $options = array()){
      echo "toto";

      /*$this->getFromDB($ID);


      $options['target']  = Toolbox::getItemTypeFormURL(__CLASS__);

      $this->showFormHeader($options);
      echo '<table class="tab_cadre_fixe">';

      echo "<tr class='line0'><td>" . __('Module name') . "&nbsp;<span class='red'>*</span></td>";
      echo "<td>";
      Html::autocompletionTextField($this,"name");
      echo "</td>";
      echo "</tr>";



      if(isset($ID) && $ID != 0){
         $lnk = new PluginMorecategoriesFeatureModule();
         $links = $lnk->find('modules_id ='.$ID);

         foreach ($links as $value) {
            $feature = new PluginMorecategoriesFeature();
            $feature->getFromDB($value['features_id']);

            echo "<tr class='line0'><td>" . __('Feature') . "</td>";
            echo "<td>";

            echo $feature->getLink();

            echo "</td>";
            echo "</tr>";
         }

      }
      echo "</table>";
    
      $this->showFormButtons($options);*/

      return true;
   }


   public static function install(Migration $migration) {

      global $DB;

      $table = getTableForItemType(__CLASS__);

      if (!TableExists($table)) {
         $migration->displayMessage("Installing $table");

         //install
         $query = "CREATE TABLE IF NOT EXISTS `$table` (
               `id` int(11) NOT NULL auto_increment,
               `name` varchar(255) collate utf8_unicode_ci default NULL,
               PRIMARY KEY  (`id`)
               ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

         $DB->query($query) or die ($DB->error());
      }

   }
   
}
