--SP ACTUALIZAR USUARIO
DELIMITER $$
CREATE PROCEDURE `pa_actualizar_Usuario`(
IN `idUsuario1` INT, IN `idRol1` INT, IN `nombre1` VARCHAR(30),
IN `apellido1` VARCHAR(30), IN `Contraseña1` VARCHAR(15),
IN `dni1` INT, IN `correo1` VARCHAR(30), IN `celular1` INT(9))
begin
  update Usuario set idRol=idRol1,nombre=nombre1,apellido=apellido1,
  Contraseña=Contraseña1,dni=dni1,correo=correo1, celular=celular1
  where idUsuario=idUsuario1;
end$$
DELIMITER;

--SP ACTUALIZAR CONTRASEÑA
DELIMITER $$
CREATE PROCEDURE `pa_actualizar_Usuario_contraseña`(
  in idUsuario1 int,
in contraseña1 varchar(15)
 )
begin
  update usuario set Contraseña=contraseña1 where idUsuario=idUsuario1;
   end$$
DELIMITER;

--SP ACTUALIZAR PRODUCTO
DELIMITER $$
CREATE PROCEDURE `pa_actualizar_producto`(
  in idProducto1 int,
 in NombreProducto1 varchar(100),
  in PrecioUnitario1 float,
  in Descripcion1 varchar(50),
  in Image1 text
 )
begin
  update Producto set NombreProducto=NombreProducto1,PrecioUnitario=PrecioUnitario1,
  Descripcion=Descripcion1,Image=Image1
  where idProducto=idProducto1;
 end$$
DELIMITER;

--SP AGREGAR INFORMACION DE ENVIO
DELIMITER $$
CREATE PROCEDURE `pa_agregar_Informacion_Envio`(
IN `CostoEnvio1` FLOAT, IN `DireccionEnvio1` VARCHAR(100),
IN `CodigoPostal1` INT, IN `Referencia1` VARCHAR(100))
begin
   insert into informacion_envio(DireccionEnvio,CodigoPostal,Referencia)
   values(DireccionEnvio1,CodigoPostal1,Referencia1);
   end$$
DELIMITER;

--SP AGREGAR USUARIO
DELIMITER $$
CREATE PROCEDURE `pa_agregar_Usuario`(
IN `idRol1` INT, IN `nombre1` VARCHAR(30), IN `apellido1` VARCHAR(30),
IN `Contraseña1` VARCHAR(15), IN `dni1` INT, IN `correo1` VARCHAR(30), IN `celular1` INT(9))
begin
   insert into Usuario(idRol,nombre,apellido,Contraseña,dni,correo,celular)
   values(idRol1,nombre1,apellido1,Contraseña1,dni1,correo1,celular1);
   end$$
DELIMITER;

--SP AGREGAR PRODUCTO
DELIMITER $$
CREATE PROCEDURE `pa_agregar_producto`(
 in nombreProducto1 varchar(100),
 in PrecioUnitario1 float,
 in Descripcion1 varchar(50),
 in Image1 text
 )
begin
   insert into producto(NombreProducto,PrecioUnitario,Descripcion,Image)
   values(NombreProducto1,PrecioUnitario1,Descripcion1,Image1);
   end$$
DELIMITER;

--SP ELIMINAR USUARIO
DELIMITER $$
CREATE PROCEDURE `pa_delete_Usuario`(
 in idUsuario1 int
 )
begin
  delete from usuario where idUsuario=idUsuario1;
   end$$
DELIMITER;

--SP ELIMINAR PRODUCTO
DELIMITER $$
CREATE PROCEDURE `pa_delete_producto`(
 in idProducto1 int
 )
begin
  delete from producto where idProducto=idProducto1;
  end$$
DELIMITER;

--SP LISTAR PRODUCTO POR IDENTIFIEDDELIMITER $$
CREATE PROCEDURE `pa_listar_Producto_id`(
in idProducto1 int)
begin
   SELECT * FROM producto WHERE idProducto=idProducto1;
   end$$
DELIMITER;

--SP LISTAR USUARIO POR ID
DELIMITER $$
CREATE PROCEDURE `pa_listar_Usuario_id`(
in idUsuario1 int)
begin
   SELECT * FROM usuario WHERE idUsuario=idUsuario1;
   end$$
DELIMITER;

--SP LISTAR DNI Y CORREO DE UN USUARIO
DELIMITER $$
CREATE PROCEDURE `pa_listar_dni_correo`(
in dni1 int,in correo1 varchar(30))
begin
   SELECT * FROM usuario WHERE dni=dni1 and correo=correo1;
   end$$
DELIMITER;

--SP LISTAR DETALLE DEL PEDIDO
DELIMITER $$
CREATE PROCEDURE `pa_listar_pedido_orden`()
BEGIN
    select pedido.idPedido, nombre,apellido,dni,celular,NombreProducto, producto.PrecioUnitario,DireccionEnvio,
    CodigoPostal, Referencia,FechaCreacion,FechaEntrega,Estado,Cantidad,Subtotal from pedido
    inner join usuario on usuario.idUsuario=pedido.idUsuario
    inner join informacion_envio on informacion_envio.idEnvio=pedido.idEnvio
    inner join detalle_pedido on detalle_pedido.idPedido=pedido.idPedido
    inner join producto on producto.idProducto=detalle_pedido.idProducto;
    END$$
DELIMITER;

--SP LISTAR DETALLE DEL BROWNIE PERSONALIZADO
DELIMITER $$
CREATE PROCEDURE `pa_listar_pedido_personalizado`()
BEGIN
select p.idPedido, nombre,apellido,dni,celular,NombreIngrediente, NombrePlantilla, Mensaje,
CantidadPersonalizado,SubtotalPer, DireccionEnvio, CodigoPostal, Referencia,
FechaCreacion,FechaEntrega,Estado from pedido p 
inner join usuario u on u.idUsuario=p.idUsuario
inner join informacion_envio e on e.idEnvio=p.idEnvio
inner join brownie_personalizado b on b.idPedido=p.idPedido
inner join ingredientes i on b.idIngrediente=i.idIngrediente
inner join caja c on b.idCaja=c.idCaja;
END$$
DELIMITER;

--SP LISTAR PRODUCTOS
DELIMITER $$
CREATE PROCEDURE `pa_listar_producto`()
BEGIN
   select *from producto;
   END$$
DELIMITER;

--SP LISTAR USUARIOS
DELIMITER $$
CREATE PROCEDURE `pa_listar_usuario`()
BEGIN
select usuario.idUsuario,rol.nombreRol,usuario.nombre,usuario.apellido,usuario.Contraseña,
usuario.dni,usuario.correo,usuario.celular,usuario.FechaRegistro from usuario
inner join rol  on usuario.idRol=rol.idRol;
END$$
DELIMITER;

--SP VALIDAR INICIO DE SESION
DELIMITER $$
CREATE PROCEDURE `splogin`(
in correo1  varchar(30),
in contraseña1  varchar(15)
 )
BEGIN
SELECT * FROM usuario where correo=correo1 and contraseña=contraseña1;
end$$
DELIMITER;