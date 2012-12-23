<?php

/**
 * Class Dribbble
 * Simple Wrapper for the Dribbble API 
 * 
 * @author Yari D'areglia (@yariok) 
 * @category Laravel Bundle
 * @version 0.9
 */
class Dribbble{ 
    
    
    //DEF  --------------------------------------------------------------------/
   
    //@var string API endpoint
    private static $endpoint = "http://api.dribbble.com/";
    
    //@var string valid value for shot lists
    private static $shotList = array("debuts","everyone","popular");
        

    
    // PRIVATE Methods --------------------------------------------------------/
    
    public static function callMethod($method, $params, $page = 0, $per_page = 0){ 
        if(method_exists(__CLASS__, $method)){ 
            return call_user_func_array(__CLASS__."::".$method, array($params, $page, $per_page));
        }else{ 
            return self::errorMessage("Method $method doesn't exist");
        }
    }
    
    /**
     * @name shots
     * @param int $id
     * @return json 
     */
    public static function shots($id){        
        return self::performRequest("shots/$id");
    }
    
    /**
     * @name shotsList
     * @param string $list "debuts","everyone","popular"
     * @param int $page
     * @param int $per_page
     * @return json 
     */
    public static function shotsList($list, $page = 0, $per_page = 0){
        
       if(!in_array($list, Dribbble::$shotList)){ 
           return self::errorMessage("Not found");
       }       
       
       return self::performRequest("shots/$list", $page, $per_page);
    }    
    
    /**
     * @name rebouds
     * @param int $id
     * @param int $page
     * @param int $per_page
     * @return json 
     */
    public static function rebounds($id, $page = 0, $per_page = 0){ 
        return self::performRequest("shots/$id/rebounds", $page, $per_page);
    }
    
    /**
     * @name comments
     * @param int  $id
     * @param int $page
     * @param int $per_page
     * @return type 
     */
    public static function comments($id, $page = 0, $per_page = 0){
        return self::performRequest("shots/$id/comments", $page, $per_page);    
    }
    
    /**
     * @name playerShots
     * @param int/string $playerId
     * @param int $page
     * @param int $per_page
     * @return json 
     */
    public static function playersShots($playerId, $page = 0, $per_page = 0){ 
        return self::performRequest("players/$playerId/shots", $page, $per_page);    
    }
    
    /**
     * @name playerShotsFollowing
     * @param int/string $playerId
     * @param int $page
     * @param int $per_page
     * @return json
     */
    public static function playersShotsFollowing($playerId, $page = 0, $per_page = 0){  
        return self::performRequest("players/$playerId/shots/following", $page, $per_page);
    }

    /**
     * @name playerShotsLikes
     * @param int/string $playerId
     * @param int $page
     * @param int $per_page
     * @return type 
     */
    public static function playersShotsLikes($playerId, $page = 0, $per_page = 0){  
        return self::performRequest("players/$playerId/shots/likes", $page, $per_page);
    }    
    
    /**
     * @name player
     * @param int/string $playerId
     * @return json 
     */
    public static function players($playerId){ 
        return self::performRequest("players/$playerId");        
    }
    
    /**
     * @name playerFollowers
     * @param int/string $playerId
     * @param int $page
     * @param int $per_page
     * @return json 
     */
    public static function playersFollowers($playerId, $page = 0, $per_page = 0){ 
        return self::performRequest("players/$playerId/followers", $page, $per_page);        
    }
        
    /**
     * @name playerFollowing
     * @param int/string $playerId
     * @param int $page
     * @param int $per_page
     * @return json 
     */
    public static function playersFollowing($playerId, $page = 0, $per_page = 0){
        return self::performRequest("players/$playerId/following", $page, $per_page);  
    }

    /**
     * @name playerDraftees
     * @param int/string $playerId
     * @param int $page
     * @param int $per_page
     * @return type 
     */
    public static function playersDraftees($playerId, $page = 0, $per_page = 0){
        return self::performRequest("players/$playerId/draftees", $page, $per_page);  
    }
    
    
    // PRIVATE methods --------------------------------------------------------/

    /**
     * @name errorMessage
     * @
     * @param type $value
     * @return json 
     */
    private static function errorMessage($txt){ 
        
        $message = array("message"=>$txt);
        
        return json_encode($message);
    }    
    
    /**
     * @name perforRequest
     * @param string $requestName
     * @param int $page
     * @param int $per_page
     * @return json 
     */
    private static function  performRequest($requestName, $page = 0, $per_page = 0){ 
        
        $pagination = self::buildPagination($page, $per_page);
        $data = json_decode(file_get_contents(self::$endpoint ."/".$requestName.$pagination));
        
        return $data;
    }
    
    /**
     * @name buildPagination
     * @param int $page
     * @param int $per_page
     * @return json 
     */
    private static function buildPagination($page, $per_page){ 
        
        $pagination = NULL;
        
        if($page){ 
            $pagination = "?page=$page";
        }
        
        if($per_page){
            if($pagination){ 
                $pagination .= "&per_page=$per_page";
            }else{ 
                $pagination .= "?per_page=$per_page";
            }
        }
        
        return $pagination;
    }
    
}
?>
