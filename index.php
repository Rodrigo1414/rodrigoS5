<?php
    require_once "models/usuario.php";

    switch($_SERVER['REQUEST_METHOD']){
        case 'GET':
            if(isset($_GET['id'])){
                echo json_encode(usuario::getWhere($_GET['id']));
            }
            else{
                echo json_encode(usuario::getAll());
            }//end else
            break;
        case 'POST':
            $datos = json_decode(file_get_contents('php://input'));
            if($datos != null) {
                if(usuario::insert($datos->id_mascota, $datos->nombre_hobby, 
                $datos->frecuencia, $datos->agenda, $datos->fecha_creacion)){
                    http_response_code(200);                    
                }
                else{
                    http_response_code(400);   
                }
            } 
            else{
                http_response_code(405);   
            }//end else
            
            break;
            case 'PUT':
                $datos = json_decode(file_get_contents('php://input'));
                if($datos != null) {
                    if(usuario::update($datos->id,$datos->id_mascota, $datos->nombre_hobby, 
                    $datos->frecuencia, $datos->agenda, $datos->fecha_creacion)){
                        http_response_code(200);                    
                    }
                    else{
                        http_response_code(400);   
                    }
                } 
                else{
                    http_response_code(405);   
                }//end else
                
                break;
            case 'DELETE':
                if(isset($_GET['id'])){
                    if(usuario::delete($_GET['id'])){
                        http_response_code(200);
                    }
                    else{
                        http_response_code(400);
                    }
                }  
                else{
                    http_response_code(405);
                } 
                break;          
            
        default:
            break;

    }
