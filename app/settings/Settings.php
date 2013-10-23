<?php

namespace SlamWebTools;

class Settings
{
    public function SiteName(){
        //this is set as a constant at the moment, but can be modified to pull the site name from the DB
        return 'Slam Web Tools';
    }

    public function termsErrorMessage(){
        return '*You must agree to the site terms and conditions';
    }

    public function createBreadcrumbs(){
        $uri = \Request::path();
        $itemPathArray = explode('/', $uri);
        $breadcrumbs = array('Home' => '/');
        $path = '';
        $arrTot = count($itemPathArray);
        $count = 1;
        foreach ($itemPathArray as $i){
            $path = $path . '/' . $i;
            $i = mb_convert_case($i, MB_CASE_TITLE, "UTF-8");
            if ($count == $arrTot){
                $breadcrumbs[] = $i;
            }
            else
            {
                $breadcrumbs[$i] = $path;
            }
            $count++;
        }
        return $breadcrumbs;
    }

    public function formatErrors($errors){
        $formattedString = '<ul>';
        foreach ($errors as $error){
            if ($error != ''){
                $formattedString .= '<li>' . $error . '</li>';
            }
        }
        $formattedString  = $formattedString . '</ul>';
        return $formattedString;
    }

    public function nameTitlesList(){
        return array(
            '' => 'Please Select',
            'Mr' => 'Mr',
            'Mrs' => 'Mrs',
            'Miss' => 'Miss',
            'Ms' => 'Ms',
            'Dr' => 'Dr',
            'Sir' => 'Sir',
            'Dame' => 'Dame',
            'Lord' => 'Lord',
            'Lady' => 'Lady',
            'Reverend' => 'Reverend',
            'Father' => 'Father'
        );
    }

    public function countryList(){
        return array(
            '' => 'Please Select',
            'AU' => 'Australia',
            'CA' => 'Canada',
            'FR' => 'France',
            'DE' => 'Germany',
            'NZ' => 'New Zealand',
            'GB' => 'United Kingdom',
            'US' => 'United States'
        );
    }

}