<?php
class UNL_OpenMap_Router
{
    public static function getRoute($requestURI)
    {

        if (!empty($_SERVER['QUERY_STRING'])) {
            $requestURI = substr($requestURI, 0, -strlen($_SERVER['QUERY_STRING']) - 1);
        }

        // Trim the base part of the URL
        $requestURI = substr($requestURI, strlen(parse_url(UNL_OpenMap_Controller::getURL(), PHP_URL_PATH)));
        return self::determineView($requestURI);
    }

    protected static function determineView($requestURI)
    {
        $options = array();

        if (empty($requestURI)) {
            // Default view/homepage
            return $options;
        }

        switch(true) {
            // Campus specific prefix
            case preg_match('/^campus\/(east|city|innovation)$/', $requestURI, $matches):
                $options['view'] = 'map';
                $options['feature'] = 'building';
                $options['marker'] = $matches[1];
                break;

            //Show specific map markers/features on map init.
            case preg_match('/^((buildings|bikeracks|policestations|emergencyphones|sculptures|campuses)\|?)+$/', $requestURI, $matches):
                $options['view'] = $matches[0];
                break;

            // Support for older building links, eg: maps.unl.edu/501
            case preg_match('/^([\w]+)$/', $requestURI, $matches):
                $options['view'] = 'building';
                $options['code'] = $matches[1];
                break;

            // Old building image links
            case preg_match('/^([\w]+)\/image$/', $requestURI, $matches):
                $options['view']   = 'building';
                $options['code']   = $matches[1];
                $options['nugget'] = 'image';
                break;

            // Direct feature link, eg: maps.unl.edu/building/501 or maps.unl.edu/sculpture/crazystairs
            case preg_match('/^([\w]+)\/([\w]+)$/', $requestURI, $matches):
                $options['view'] = $matches[1];
                $options['code'] = $matches[2];
                break;

            // GeoRSS Feeds
            case preg_match('/^rss_(all|city|east)\.xml/', $requestURI, $matches):
                $options['view']   = 'rss_'.$matches[1].'.xml';
                $options['format'] = 'georss';
                break;

            // Allow parameters following three levels, eg: maps.unl.edu/building/501/image/3/sm
            case preg_match('/^(([\w]+)\/)+([\w]+)$/', $requestURI, $matches):
                $matches = preg_split('/\//', $requestURI);

                $options['view']   = $matches[0];
                $options['code']   = $matches[1];
                $options['nugget'] = $matches[2];
                $i = 3;
                while (array_key_exists($i, $matches)
                       && $matches[$i] !== null && $matches[$i] !== '') {
                    $options['parameters'][] = $matches[$i];
                    $i++;
                }
                break;
            case preg_match('/^images\/markers\/google\/([\w]+).png$/', $requestURI):
                // Marker image that is unknown
                header('Location: '.UNL_OpenMap_Controller::getURL().'images/markers/google/building.png');
                exit();
                break;
       /*     case preg_match('/^images\/tilesets\/unl\/16\/15166\/([\w]+).([\w]+)$/', $requestURI, $matches):
                // Marker image that is unknown
                echo $matches[1];exit;
                header('Location: '.UNL_OpenMap_Controller::getURL().'images/tilesets/'.$matches[0]);
                exit();
                break;*/
            default:
                $options['view'] = 404;
                break;
        }
        return $options;
    }
}
