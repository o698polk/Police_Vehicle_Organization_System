
document.addEventListener('DOMContentLoaded', function() {

//FUNCIONES EN EJECUCION

login();
CrearUser();

//********************* */

    function  login(){
        $(document).on('submit',"#form_log",function(e){
          e.preventDefault();
        
        let email=$("#usercorreo").val();
        let pass=$("#pass").val();    
         let Datos={
          userlogin:email,
          passlogin:pass
        
         }
        
         if(email.trim().length>0&&pass.trim().length>0){
        
        
         if(confirm('Iniciar Sesión')){
  
        $.post("backend/datos/contro.php",Datos, function(data) {
             console.log(data);      
        
             if(data==1){
              window.location.href = "cpaneles";
            }else{
              alert("Error");
            }
        
            });
        
        
        } }
        
          });
        
        }
  
        function  CrearUser(){
            $(document).on('submit',"#registrarusuario",function(e){
              e.preventDefault();
            let name=$("#nombre_apellido").val();
            let user=$("#usuario").val();
            let email=$("#correo").val();
            let pass=$("#clave").val();    
            let pass2=$("#clave2").val(); 
            let rol=$("#rol").val(); 
            
          //  let id_user=$("#descript_nw").attr('id_user');
            
              var formData = new FormData(document.getElementById("registrarusuario"));
            //  formData.append('id_ususario',id_user);
            if(rol==null){
              rol=0;
            }
            
            
             if(email.trim().length > 0 && pass.trim().length > 0 && user.trim().length > 0 && name.trim().length > 0 && rol.trim().length > 0){
            
            if(pass==pass2){
    
           
             if(confirm('Crear Usuario')){
                $.ajax({
                    url: "registrar_usuario",
                    type: "post",
                    dataType: "html",
                    data: formData,
                    cache: false,
                    contentType: false,
                 processData: false,
                 beforeSend: function(xhr) {
                    xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
                }
                })
                 
                    .done(function(r){
                     console.log(r);
                        if (r == 1) {
                            if(confirm("Creado Correctamente,Quieres recargar la pagina?")){
                                location.reload();
                              }
                  
    
                    } else {
                      alert("Error");
              
                      }
    
    
                    });
            
            } 
          }else{
            alert("Clave secundaria incorrecta")
          }
        }else{
          alert("Datos Vacion no permitidos")
        }
            
              });
            
            }

//FUNCION PARA LA EDICION DE USUAIO ENVIO DE DATOS MEDIANTE AJAX A L CONTROLADOR      

function  EditarUser(){
    $(document).on('submit',"#edit_user",function(e){
      e.preventDefault();
    
    let email=$("#email_user_edit").val();
    let pass=$("#passedit_edit").val();    
    let rol=$("#rol_edit").val(); 
    let id_user= $("#email_user_edit").attr('id_user');
     let Datos={
      emailcrear_edit:email,
      passcreate_edit:pass,
       rolus_edit:rol,
       id_user_edit:id_user
     }
    
     if(email.trim().length>0&&pass.trim().length>0){
    
    
     if(confirm('Editar Usuario/-'+id_user)){

    $.post("php/datos/contro.php",Datos, function(data) {
         console.log(data);      
    
         if(data==1){
          location.reload();
        }else{
        alert("Error");
        }
    
        });
    
    
    } }
    
      });
    
    }

 //FUNCION PARA LA ELIMINACION DE USUAIO ENVIO DE DATOS MEDIANTE AJAX A L CONTROLADOR 

 function  EliminarUsuario(){
    $(document).on('click',".boton_eliminarUser",function(e){
      e.preventDefault();
        id_user=$(this).attr('id_userdata');
      let Datos={
       id_userdataeliminar:id_user
      
       }
      if(confirm('Eliminar Usuario/-'+id_user)){
      $.post("php/datos/contro.php",Datos, function(data) {
        console.log(data);      
   
        if(data==1){
          location.reload();
       }else{
   $('.MostrarPorceso').html('<p style="font-size:20px; color:red; ">Error Eliminacion</p>');
                setTimeout(function(){
   $('.MostrarPorceso').html('');
                      },10000); 
       }
   
       });

      }

      });
    }

});
  