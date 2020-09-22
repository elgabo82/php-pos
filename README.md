# README #
# Proyecto POS

### PHP
### HTML5
### JQuery
### CSS3
### PHP
### Javascript
### Ajax
### Bootstrap
### DataTables
### Much&oacute;s m&aacute;s



## gabrielmorejon@gmail.com
## gabriel@grupofmo.com


### Código usado anteriormente en productos

        <tbody>
            <?php

              $item = null;
              $valor = null;
              $productos = ControladorProductos::ctrMostrarProductos($item, $valor);

              foreach ($productos as $key => $value) {

                echo '
                <tr>
                <td>'.$value["id"].'</td>
                <td><img src="'.$value["imagen"].'" class="img-thumbnail" width="40px"></td>
                <td>'.$value["codigo"].'</td>
                <td>'.$value["descripcion"].'</td>';
                
                $item = "id";
                $valor = $value["id_categoria"];

                $categoria = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                echo '
                <td>'.$categoria["categoria"].'</td>
                <td>'.$value["stock"].'</td>  
                <td>'.$value["precio_compra"].'</td>
                <td>'.$value["precio_venta"].'</td>
                <td>'.$value["fecha"].'</td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-warning"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                  </div>
                </td>
              </tr>';
              }

              //var_dump($productos);
            ?>                              
            </tbody>      