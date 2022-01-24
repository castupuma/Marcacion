-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-01-2022 a las 05:06:07
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inova_calendar`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_spRegistrarActividades` (IN `_idactividades` INT, IN `_idservicio` INT, IN `_descripcion` VARCHAR(200), IN `_estado` INT)  BEGIN

declare _fecharegistro datetime;
  declare _codrespuesta int default 0;
  declare _registros int;
  declare _detalle varchar(100);

  set _fecharegistro = (select now());
  set _registros = (select count(*) from p_actividades where idactividades=_idactividades);
  if _registros >0 then

  UPDATE p_actividades set
  idservicio=_idservicio,
  descripcion=_descripcion ,
  estado=_estado

  WHERE idactividades =_idactividades;
  SET _codrespuesta =1;
  set _detalle ='Se Actualizo los datos Correctamente';
  select _codrespuesta as codigo,_detalle as mensaje;

  else
  INSERT INTO p_actividades (idservicio,descripcion, estado)
  VALUES(

  _idservicio,
  _descripcion ,
  _estado);

  SET _codrespuesta =1;
  set _detalle ='Se Registro los datos Correctamente';
  select _codrespuesta as codigo,_detalle as mensaje;

  end if;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p_spRegistrarArea` (`_idarea` INT, `_idservicio` INT, `_descripcion` VARCHAR(200), `_estado` INT)  BEGIN

  declare _fecharegistro datetime;
  declare _codrespuesta int default 0;
  declare _registros int;
  declare _detalle varchar(100);

  set _fecharegistro = (select now());
  set _registros = (select count(*) from p_area where idarea=_idarea);
  if _registros >0 then

  UPDATE p_area set
  idservicio=_idservicio,
  descripcion=_descripcion ,
  estado=_estado

  WHERE idarea =_idarea;
  SET _codrespuesta =1;
  set _detalle ='Se Actualizo los datos Correctamente';
  select _codrespuesta as codigo,_detalle as mensaje;

  else
  INSERT INTO p_area (idservicio,descripcion, estado)
  VALUES(

  _idservicio,
  _descripcion ,
  _estado);

  SET _codrespuesta =1;
  set _detalle ='Se Registro los datos Correctamente';
  select _codrespuesta as codigo,_detalle as mensaje;

  end if;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p_spRegistrarDepartamento` (`_idundorganizacional` INT, `_descripcion` VARCHAR(200), `_tipo` INT, `_estado` INT)  BEGIN

  declare _fecharegistro datetime;
  declare _codrespuesta int default 0;
  declare _registros int;
  declare _detalle varchar(100);

  set _fecharegistro = (select now());
  set _registros = (select count(*) from p_unidadorganizacional where idundorganizacional=_idundorganizacional);
  if _registros >0 then

  UPDATE p_unidadorganizacional set

  descripcion=_descripcion ,
  tipo=_tipo,
  estado=_estado

  WHERE idundorganizacional =_idundorganizacional;
  SET _codrespuesta =1;
  set _detalle ='Se Actualizo los datos Correctamente';
  select _codrespuesta as codigo,_detalle as mensaje;

  else
  INSERT INTO p_unidadorganizacional (descripcion,tipo, estado)
  VALUES(


  _descripcion ,
  _tipo,
  _estado);

  SET _codrespuesta =1;
  set _detalle ='Se Registro los datos Correctamente';
  select _codrespuesta as codigo,_detalle as mensaje;

  end if;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p_spRegistrarGrupoRiesgo` (`_idgruporiesgo` INT, `_descripcion` VARCHAR(200), `_estado` INT)  BEGIN

  declare _fecharegistro datetime;
  declare _codrespuesta int default 0;
  declare _registros int;
  declare _detalle varchar(100);

  set _fecharegistro = (select now());
  set _registros = (select count(*) from p_gruporiesgo where idgruporiesgo=_idgruporiesgo);
  if _registros >0 then

  UPDATE p_gruporiesgo set

  descripcion=_descripcion ,
  estado=_estado

  WHERE idgruporiesgo =_idgruporiesgo;
  SET _codrespuesta =1;
  set _detalle ='Se Actualizo los datos Correctamente';
  select _codrespuesta as codigo,_detalle as mensaje;

  else
  INSERT INTO p_gruporiesgo (descripcion, estado)
  VALUES(


  _descripcion ,
  _estado);

  SET _codrespuesta =1;
  set _detalle ='Se Registro los datos Correctamente';
  select _codrespuesta as codigo,_detalle as mensaje;

  end if;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p_spRegistrarPerfil` (IN `_idusuario` INT, IN `_dni` VARCHAR(200), IN `_clave` VARCHAR(200), IN `_nombreusuario` VARCHAR(200), IN `_idestado` INT, IN `_idperfil` INT, IN `_avatar` VARCHAR(200))  BEGIN

  declare _fecharegistro datetime;
  declare _codrespuesta int default 0;
  declare _registros int;
  declare _detalle varchar(100);

  set _fecharegistro = (select now());
  set _registros = (select count(*) from p_usuario where idusuario=_idusuario);
  if _registros >0 then

  UPDATE p_usuario set
  dni=_dni,
  clave=_clave ,
  nombreusuario=_nombreusuario ,
  idestado=_idestado ,
  idperfil=_idperfil,
  avatar=_avatar

  WHERE idusuario =_idusuario;
  SET _codrespuesta =1;
  set _detalle ='Se Actualizo los datos Correctamente';
  select _codrespuesta as codigo,_detalle as mensaje;

  else
  INSERT INTO p_usuario (dni,clave,nombreusuario,idestado,idperfil,avatar)
  VALUES(

  _dni,
  _clave ,
  _nombreusuario,
  _idestado,
  _idperfil,
  _avatar);

  SET _codrespuesta =1;
  set _detalle ='Se Registro los datos Correctamente';
  select _codrespuesta as codigo,_detalle as mensaje;

  end if;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p_spRegistrarPersonal` (`_idplaza` INT, `_tipoplaza` INT, `_apellidopaterno` VARCHAR(200), `_apellidomaterno` VARCHAR(200), `_primernombre` VARCHAR(200), `_segundonombre` VARCHAR(200), `_nombrecompleto` VARCHAR(500), `_tipodocumento` INT, `_nrodocumento` VARCHAR(12), `_fechanacimiento` DATETIME, `_idsexo` INT, `_idestadocivil` INT, `_direccion` VARCHAR(100), `_ruc` VARCHAR(11))  BEGIN

  declare _fecharegistro datetime;
  declare _codrespuesta int default 0;
  declare _registros int;
  declare _detalle varchar(100);

  set _fecharegistro = (select now());
  set _registros = (select count(*) from p_personal where idplaza=_idplaza);
  if _registros >0 then

  UPDATE p_personal set
  idplaza =_idplaza,
  apellidopaterno=_apellidopaterno ,
  apellidomaterno=_apellidomaterno ,
  primernombre  = _primernombre ,
  segundonombre = _segundonombre ,
  nombrecompleto =_nombrecompleto ,
  tipodocumento =_tipodocumento ,
  nrodocumento =_nrodocumento ,
  fechanacimiento = _fechanacimiento ,
  idsexo =_idsexo ,
  idestadocivil = _idestadocivil ,
  direccion =_direccion ,
  ruc =_ruc

  WHERE idplaza =_idplaza;
  SET _codrespuesta =1;
  set _detalle ='Se Actualizo los datos Correctamente';
  select _codrespuesta as codigo,_detalle as mensaje;

  else
  INSERT INTO p_personal (idplaza,tipoplaza, apellidopaterno, apellidomaterno, primernombre, segundonombre, nombrecompleto, tipodocumento, nrodocumento, fechanacimiento, idsexo, idestadocivil, direccion, ruc )
  VALUES(_idplaza ,
  _tipoplaza ,
  _apellidopaterno ,
  _apellidomaterno ,
  _primernombre ,
  _segundonombre ,
  _nombrecompleto ,
  _tipodocumento ,
  _nrodocumento ,
  _fechanacimiento ,
  _idsexo ,
  _idestadocivil ,
  _direccion ,
  _ruc);

  SET _codrespuesta =1;
  set _detalle ='Se Registro los datos Correctamente';
  select _codrespuesta as codigo,_detalle as mensaje;

  end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p_spRegistrarPlanilla` (`_id` INT, `_idpersona` INT, `_idgruporiesgo` INT, `_idservicio` INT, `_idarea` INT, `_idpuestotrabajo` INT, `_observacion` VARCHAR(500), `_fechainicio` DATETIME, `_fechafin` DATETIME, `_estado` INT)  BEGIN

  declare _codrespuesta int default 0;
  declare _registros int;
  declare _detalle varchar(100);


  set _registros = (select count(*) from p_planilla where idplanilla=_id);
  if _registros >0 then

  UPDATE p_planilla set
  idpersona=_idpersona,
  idgruporiesgo=_idgruporiesgo,
  idservicio=_idservicio,
  idarea=_idarea,
  idpuestotrabajo=_idpuestotrabajo,
  observacion=_observacion,
  fechainicio=_fechainicio,
  fechafin=_fechafin,
  estado=_estado
  WHERE idplanilla =_id;
  SET _codrespuesta =1;
  set _detalle ='Se Actualizo la planilla Correctamente';
  select _codrespuesta as codigo,_detalle as mensaje;

  else
  INSERT INTO p_planilla (idpersona,
  idgruporiesgo,
  idservicio,
  idarea,
  idpuestotrabajo,
  observacion,
  fechainicio,
  fechafin,
  estado,
  usuario,
  perfil,
  equipo,
  fecha )
  VALUES(_idpersona,
  _idgruporiesgo,
  _idservicio,
  _idarea,
  _idpuestotrabajo,
  _observacion,
  _fechainicio,
  _fechafin,
  _estado,'US','PR','EQ','2021-08-02');
  SET _codrespuesta =1;
  set _detalle ='Se Registro la planilla Correctamente';
  select _codrespuesta as codigo,_detalle as mensaje;

  end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p_spRegistrarPuestoTrabajo` (`_idpuesto` INT, `_descripcion` VARCHAR(200), `_estado` INT)  BEGIN

  declare _fecharegistro datetime;
  declare _codrespuesta int default 0;
  declare _registros int;
  declare _detalle varchar(100);

  set _fecharegistro = (select now());
  set _registros = (select count(*) from p_puestotrabajo where idpuesto=_idpuesto);

  if _registros >0 then

    UPDATE p_puestotrabajo set
    descripcion=_descripcion ,
    estado=_estado

    WHERE idpuesto =_idpuesto;
    SET _codrespuesta =1;
    set _detalle ='Se Actualizo los datos Correctamente';
    select _codrespuesta as codigo,_detalle as mensaje;

  else
    INSERT INTO p_puestotrabajo (descripcion, estado)
    VALUES(

    _descripcion ,
    _estado);

  SET _codrespuesta =1;
  set _detalle ='Se Registro los datos Correctamente';
  select _codrespuesta as codigo,_detalle as mensaje;

  end if;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p_spRegistrarServicio` (`_idservicio` INT, `_idundorganizacional` INT, `_descripcion` VARCHAR(200), `_estado` INT)  BEGIN

  declare _fecharegistro datetime;
  declare _codrespuesta int default 0;
  declare _registros int;
  declare _detalle varchar(100);

  set _fecharegistro = (select now());
  set _registros = (select count(*) from p_servicio where idservicio=_idservicio);
  if _registros >0 then

  UPDATE p_servicio set
  idundorganizacional=_idundorganizacional,
  descripcion=_descripcion ,
  estado=_estado

  WHERE idservicio =_idservicio;
  SET _codrespuesta =1;
  set _detalle ='Se Actualizo los datos Correctamente';
  select _codrespuesta as codigo,_detalle as mensaje;

  else
  INSERT INTO p_servicio (idundorganizacional,descripcion, estado)
  VALUES(

  _idundorganizacional,
  _descripcion ,
  _estado);

  SET _codrespuesta =1;
  set _detalle ='Se Registro los datos Correctamente';
  select _codrespuesta as codigo,_detalle as mensaje;

  end if;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p_spRegistrarTurnoAdmin` (`_idplanilla` INT, `_periodo` INT, `_mes` INT, `_dia` INT, `_idturno` INT, `_idhora` INT, `_idarea` INT, `_idtipomodalidad` INT, `_idusuarioAdmin` INT)  BEGIN
  declare _horaIngreso varchar(5) default '00:00';
	declare _horaegreso varchar(5) default '00:00';
	declare _nrohoras int default 0;
	declare _fechahoraingreso datetime default null;
	declare _fechahoraegreso datetime default null;
  declare _autoriza int default 0;
  declare _fecharegistro datetime;

  declare _codrespuesta int default 0;
  declare _detalle varchar(100) default 'Tiene un Horario Autorizado';




  set _fecharegistro=now();
                                                                                       

  select nombre into _horaIngreso
			from p_horas
			where idhora = _idhora limit 1 ;


  set _nrohoras =ifnull((SELECT horas FROM p_turnos WHERE idturno=_idturno),0);

  set _fechahoraingreso =(select concat(concat_ws('-',lpad(_periodo,4,'0'),lpad(_mes,2,'0'),lpad(_dia,2,'0')),' ',_horaIngreso));

  set _fechahoraegreso  =(select ADDDATE(_fechahoraingreso, INTERVAL _nrohoras hour) );

  set _horaegreso  = substring(_fechahoraegreso,12,5);


  set _autoriza = ifnull((SELECT idusuarioautoriza FROM `p_rolprogramacion` WHERE `idplanilla`=_idplanilla AND `periodo`=_periodo AND `mes`=_mes AND `dia`=_dia AND `idusuarioautoriza`<>0 limit 1),0) ;


  if _autoriza =0 then

    INSERT INTO p_rolprogramacion (idplanilla, periodo, mes, dia, idturno, idhora, idarea,idtipomodalidad, horaIngreso, horaegreso, fechahoraingreso, fechahoraegreso, idusuarioregistra, fecharegistro,nrohoras)
            VALUES          ( _idplanilla, _periodo, _mes, _dia, _idturno, _idhora, _idarea,_idtipomodalidad, _horaIngreso, _horaegreso, _fechahoraingreso, _fechahoraegreso, _idusuarioAdmin, _fecharegistro,_nrohoras)
            ON DUPLICATE KEY UPDATE idturno = VALUES(idturno),idhora = VALUES(idhora),idarea = VALUES(idarea),
            horaIngreso = VALUES(horaIngreso),horaegreso = VALUES(horaegreso),fechahoraingreso = VALUES(fechahoraingreso),
            fechahoraegreso = VALUES(fechahoraegreso),idusuarioregistra = VALUES(idusuarioregistra),fecharegistro = VALUES(fecharegistro),nrohoras = VALUES(nrohoras),
            idestado = 0;
  set _codrespuesta=1;
  set _detalle ='Se Registro el Horario Correctamente';

  end if;


  select _codrespuesta as codigo,_detalle as mensaje;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_accesosmenu`
--

CREATE TABLE `p_accesosmenu` (
  `idacceso` int(10) UNSIGNED NOT NULL,
  `idperfil` int(10) UNSIGNED NOT NULL,
  `idmenu` int(10) UNSIGNED NOT NULL,
  `idestado` int(10) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `p_accesosmenu`
--

INSERT INTO `p_accesosmenu` (`idacceso`, `idperfil`, `idmenu`, `idestado`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 3, 1),
(4, 1, 4, 1),
(5, 1, 5, 1),
(6, 1, 6, 1),
(7, 1, 7, 1),
(8, 1, 8, 1),
(9, 1, 9, 1),
(10, 2, 1, 1),
(11, 2, 2, 1),
(12, 2, 4, 1),
(13, 2, 7, 1),
(14, 2, 8, 1),
(15, 2, 9, 1),
(16, 3, 1, 1),
(17, 3, 2, 1),
(18, 3, 4, 1),
(19, 3, 7, 1),
(20, 3, 8, 1),
(21, 3, 9, 1),
(22, 4, 1, 1),
(23, 4, 2, 1),
(24, 4, 4, 1),
(25, 4, 7, 1),
(26, 4, 8, 1),
(27, 4, 9, 1),
(28, 5, 1, 1),
(29, 5, 4, 1),
(30, 5, 7, 1),
(31, 5, 8, 1),
(32, 5, 9, 1),
(33, 6, 1, 1),
(34, 6, 4, 1),
(35, 6, 7, 1),
(36, 6, 8, 1),
(37, 7, 1, 1),
(38, 7, 2, 1),
(39, 7, 3, 1),
(40, 7, 4, 1),
(41, 7, 6, 1),
(42, 7, 7, 1),
(43, 7, 8, 1),
(44, 7, 9, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_actividad`
--

CREATE TABLE `p_actividad` (
  `idactividad` int(11) NOT NULL,
  `idrol` int(11) DEFAULT NULL,
  `id_actividades` varchar(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `cantidadeje` int(11) DEFAULT NULL,
  `observacion` varchar(500) DEFAULT NULL,
  `indjefe` bit(1) DEFAULT NULL,
  `indpersonal` int(11) DEFAULT NULL,
  `usuario` varchar(15) DEFAULT NULL,
  `perfil` varchar(15) DEFAULT NULL,
  `equipo` varchar(15) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `usuariomod` varchar(15) DEFAULT NULL,
  `perfilmod` varchar(15) DEFAULT NULL,
  `equipomod` varchar(15) DEFAULT NULL,
  `fechamod` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_actividades`
--

CREATE TABLE `p_actividades` (
  `idactividades` int(11) NOT NULL,
  `idservicio` int(11) NOT NULL DEFAULT 0,
  `descripcion` varchar(200) NOT NULL DEFAULT '',
  `estado` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `color` varchar(45) DEFAULT NULL,
  `background` varchar(45) DEFAULT NULL,
  `clase` varchar(45) DEFAULT NULL,
  `clase2` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_area`
--

CREATE TABLE `p_area` (
  `idarea` int(11) NOT NULL,
  `idservicio` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `estado` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `color` varchar(45) DEFAULT NULL,
  `background` varchar(45) DEFAULT NULL,
  `clase` varchar(45) DEFAULT NULL,
  `clase2` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `p_area`
--

INSERT INTO `p_area` (`idarea`, `idservicio`, `descripcion`, `estado`, `color`, `background`, `clase`, `clase2`) VALUES
(1, 1, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(2, 2, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(3, 3, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(4, 4, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(5, 5, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(6, 6, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(7, 7, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(8, 8, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(9, 9, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(10, 10, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(11, 11, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(12, 12, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(13, 13, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(14, 14, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(15, 15, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(16, 16, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(17, 17, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(18, 18, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(19, 19, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(20, 20, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(21, 21, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(22, 22, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(23, 23, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(24, 24, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(25, 25, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(26, 26, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(27, 27, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(28, 28, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(29, 29, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(30, 30, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(31, 31, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(32, 32, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(33, 33, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(34, 34, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(35, 35, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(36, 36, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(37, 37, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(38, 38, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(39, 39, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(40, 40, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(41, 41, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(42, 42, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(43, 43, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(44, 44, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(45, 45, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(46, 46, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(47, 47, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(48, 48, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(49, 49, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(50, 50, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(51, 51, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(52, 52, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(53, 53, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(54, 54, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(55, 55, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(56, 56, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(57, 57, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(58, 58, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(59, 59, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(60, 60, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(61, 61, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(62, 62, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(63, 63, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(64, 64, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(65, 65, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(66, 66, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(67, 67, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(68, 68, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(69, 69, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(70, 70, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(71, 71, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(72, 72, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(73, 73, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(74, 74, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(75, 75, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(76, 76, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(77, 77, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(78, 78, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(79, 79, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(80, 80, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(81, 81, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(82, 82, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(83, 83, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(84, 84, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(85, 85, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(86, 86, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(87, 87, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(88, 88, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(89, 89, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(90, 90, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(91, 91, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(92, 92, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(93, 93, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1'),
(94, 94, 'SIN AREA', 0, 'white', '#62D97D', 'color-1', 'color-1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_cargo`
--

CREATE TABLE `p_cargo` (
  `idcargo` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `estado` char(1) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `perfil` varchar(15) NOT NULL,
  `equipo` varchar(15) NOT NULL,
  `fecha` datetime NOT NULL,
  `usuariomod` varchar(15) DEFAULT NULL,
  `perfilmod` varchar(15) DEFAULT NULL,
  `equipomod` varchar(15) DEFAULT NULL,
  `fechamod` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `p_cargo`
--

INSERT INTO `p_cargo` (`idcargo`, `descripcion`, `estado`, `usuario`, `perfil`, `equipo`, `fecha`, `usuariomod`, `perfilmod`, `equipomod`, `fechamod`) VALUES
(1, 'MEDICO', 'A', '71773541', '1', 'PC', '2021-07-04 00:00:00', NULL, NULL, NULL, NULL),
(2, 'DIGITADOR', 'A', '71773541', '2', 'PC', '2021-07-04 00:00:00', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_diassemana`
--

CREATE TABLE `p_diassemana` (
  `iddia` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `p_diassemana`
--

INSERT INTO `p_diassemana` (`iddia`, `nombre`) VALUES
(1, NULL),
(2, NULL),
(3, NULL),
(4, NULL),
(5, NULL),
(6, NULL),
(7, NULL),
(8, NULL),
(9, NULL),
(10, NULL),
(11, NULL),
(12, NULL),
(13, NULL),
(14, NULL),
(15, NULL),
(16, NULL),
(17, NULL),
(18, NULL),
(19, NULL),
(20, NULL),
(21, NULL),
(22, NULL),
(23, NULL),
(24, NULL),
(25, NULL),
(26, NULL),
(27, NULL),
(28, NULL),
(29, NULL),
(30, NULL),
(31, NULL),
(0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_especialidad`
--

CREATE TABLE `p_especialidad` (
  `idespecialidad` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `estado` char(1) DEFAULT NULL,
  `usuario` varchar(15) DEFAULT NULL,
  `perfil` varchar(15) DEFAULT NULL,
  `equipo` varchar(15) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `usuariomod` varchar(15) DEFAULT NULL,
  `perfilmod` varchar(15) DEFAULT NULL,
  `equipomod` varchar(15) DEFAULT NULL,
  `fechamod` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_estadocivil`
--

CREATE TABLE `p_estadocivil` (
  `idestadocivil` int(11) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `p_estadocivil`
--

INSERT INTO `p_estadocivil` (`idestadocivil`, `descripcion`, `estado`) VALUES
(1, 'Soltero', 'A'),
(2, 'Casado', 'A'),
(3, 'Viudo', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_gruporiesgo`
--

CREATE TABLE `p_gruporiesgo` (
  `idgruporiesgo` int(11) NOT NULL,
  `idtipogruporiesgo` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `estado` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `usuario` varchar(15) DEFAULT NULL,
  `perfil` varchar(15) DEFAULT NULL,
  `equipo` varchar(15) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `usuariomod` varchar(15) DEFAULT NULL,
  `perfilmod` varchar(15) DEFAULT NULL,
  `equipomod` varchar(15) DEFAULT NULL,
  `fechamod` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `p_gruporiesgo`
--

INSERT INTO `p_gruporiesgo` (`idgruporiesgo`, `idtipogruporiesgo`, `descripcion`, `estado`, `usuario`, `perfil`, `equipo`, `fecha`, `usuariomod`, `perfilmod`, `equipomod`, `fechamod`) VALUES
(1, 0, '--------SIN GRUPO DE RIESGO--------', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 0, 'EDAD MAYOR A 60 AÃ‘OS', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 0, 'HIPERTENSION ARTERIAL NO CONTROLADA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 0, 'ENFERMEDADES CARDIOVASCULARES GRAVES', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 0, 'CANCÃ‰R', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 0, 'DIABETES MELLITUS', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 0, 'ASMA MODERADA O GRAVE', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 0, 'ENFERMEDAD PULMONAR CRONICA ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 0, 'INSUFICIENCIA RENAL CRÃ“NICA EN TRATAMIENTO CON HEMODIALISIS', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 0, 'ENFERMEDAD O TRATAMIENTO INMUNOSUPRESOR', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 0, 'OBESIDAD CON IMC DE 40 A MAS', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 0, 'GESTACIÃ“N', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_horaingreso`
--

CREATE TABLE `p_horaingreso` (
  `idhoraingreso` int(10) UNSIGNED NOT NULL,
  `idturno` int(10) UNSIGNED NOT NULL,
  `idhora` int(10) UNSIGNED NOT NULL,
  `idestado` int(10) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `p_horaingreso`
--

INSERT INTO `p_horaingreso` (`idhoraingreso`, `idturno`, `idhora`, `idestado`) VALUES
(1, 1, 2, 0),
(2, 2, 7, 0),
(3, 3, 2, 0),
(4, 3, 7, 0),
(5, 4, 2, 0),
(7, 5, 5, 0),
(8, 6, 2, 0),
(10, 7, 2, 0),
(12, 1, 1, 0),
(13, 2, 6, 0),
(17, 5, 4, 0),
(6, 4, 3, 0),
(9, 6, 3, 0),
(11, 7, 3, 0),
(14, 4, 1, 0),
(15, 5, 1, 0),
(16, 6, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_horas`
--

CREATE TABLE `p_horas` (
  `idhora` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(5) NOT NULL,
  `idestado` int(10) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `p_horas`
--

INSERT INTO `p_horas` (`idhora`, `nombre`, `idestado`) VALUES
(1, '07:00', 0),
(2, '08:00', 0),
(3, '09:00', 0),
(4, '13:00', 0),
(5, '14:00', 0),
(6, '19:00', 0),
(7, '20:00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_menu`
--

CREATE TABLE `p_menu` (
  `idmenu` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `referencia` varchar(45) NOT NULL,
  `idestado` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `idmenusub` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `etiqueta` varchar(2000) NOT NULL,
  `etiquetaActiva` varchar(2000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `p_menu`
--

INSERT INTO `p_menu` (`idmenu`, `descripcion`, `referencia`, `idestado`, `idmenusub`, `etiqueta`, `etiquetaActiva`) VALUES
(1, 'Principal', './principal.php', 1, 0, '<li class=\"nav-item\">\r\n	<a href=\"./principal.php\" class=\"nav-link\">\r\n		<i class=\"nav-icon fa fa-home\"></i>\r\n		<p> Principal\r\n                </p>\r\n	</a>\r\n</li>', '<li class=\"nav-item\">\r\n	<a href=\"./principal.php\" class=\"nav-link  active\">\r\n		<i class=\"nav-icon fa fa-home\"></i>\r\n		<p> Principal\r\n                </p>\r\n	</a>\r\n</li>'),
(2, 'Programacion', './programacion.php', 1, 0, '<li class=\"nav-item\">\r\n	<a href=\"./programacion.php\" class=\"nav-link\">\r\n		<i class=\"nav-icon far fa-calendar-alt\"></i>\r\n		<p> Programacion\r\n                </p>\r\n	</a>\r\n</li>', '<li class=\"nav-item\">\r\n	<a href=\"./programacion.php\" class=\"nav-link  active\">\r\n		<i class=\"nav-icon far fa-calendar-alt\"></i>\r\n		<p> Programacion\r\n                </p>\r\n	</a>\r\n</li>'),
(3, 'Personal', './personal.php', 1, 0, '<li class=\"nav-item\">\r\n	<a href=\"./personal.php\" class=\"nav-link\">\r\n		<i class=\"nav-icon fa fa-users\"></i>\r\n		<p> Personal\r\n                </p>\r\n	</a>\r\n</li>', '<li class=\"nav-item\">\r\n	<a href=\"./personal.php\" class=\"nav-link  active\">\r\n		<i class=\"nav-icon fa fa-users\"></i>\r\n		<p> Personal\r\n                </p>\r\n	</a>\r\n</li>'),
(4, 'Actividad', './actividad.php', 1, 0, '<li class=\"nav-item\">\r\n	<a href=\"./actividad3.php\" class=\"nav-link\">\r\n		<i class=\"nav-icon fa fa-list-ul\"></i>\r\n		<p> Actividad\r\n                </p>\r\n	</a>\r\n</li>', '<li class=\"nav-item\">\r\n	<a href=\"./actividad3.php\" class=\"nav-link  active\">\r\n		<i class=\"nav-icon fa fa-list-ul\"></i>\r\n		<p> Actividad\r\n                </p>\r\n	</a>\r\n</li>'),
(5, 'Mantenimiento', './mantenimiento.php', 1, 1, '<li class=\"nav-item has-treeview\">\r\n<a href=\"#\" class=\"nav-link\">\r\n<i class=\"nav-icon fa fa-cogs\"></i>\r\n<p>Mantenimiento<i class=\"fas fa-angle-left right\"></i></p></a>\r\n<ul class=\"nav nav-treeview\" style=\"display: none;\">\r\n<li class=\"nav-item\"><a href=\"./departamento.php\" class=\"nav-link\"><i class=\"nav-icon far fa-building\"></i><p>Departamentos</p></a></li>\r\n<li class=\"nav-item\"><a href=\"./servicio.php\" class=\"nav-link\"><i class=\"nav-icon fas fa-user-md\"></i><p>Servicios</p></a></li>\r\n<li class=\"nav-item\"><a href=\"./areas.php\" class=\"nav-link\"><i class=\"nav-icon fas fa-desktop\"></i><p>Areas</p></a></li>\r\n<li class=\"nav-item\"><a href=\"./mantenimiento.php\" class=\"nav-link\"><i class=\"nav-icon fas fa-briefcase\"></i><p> Puesto de Trabajo</p></a></li>\r\n<li class=\"nav-item\"><a href=\"./grupoRiesgo.php\" class=\"nav-link\"><i class=\"nav-icon fas fa-briefcase-medical\"></i><p> Grupo de Riesgo</p></a></li>\r\n<li class=\"nav-item\"><a href=\"./perfiles.php\" class=\"nav-link\"><i class=\"nav-icon fas fa-user\"></i><p> Usuarios</p></a></li>', '<li class=\"nav-item has-treeview\">\r\n<a href=\"#\" class=\"nav-link\">\r\n<i class=\"nav-icon fa fa-cogs\"></i>\r\n<p>Mantenimiento<i class=\"fas fa-angle-left right\"></i></p></a>\r\n<ul class=\"nav nav-treeview\" style=\"display: none;\">\r\n<li class=\"nav-item\"><a href=\"./departamento.php\" class=\"nav-link\"><i class=\"nav-icon far fa-building\"></i><p>Departamentos</p></a></li>\r\n<li class=\"nav-item\"><a href=\"./servicio.php\" class=\"nav-link\"><i class=\"nav-icon fas fa-user-md\"></i><p>Servicios</p></a></li>\r\n<li class=\"nav-item\"><a href=\"./areas.php\" class=\"nav-link\"><i class=\"nav-icon fas fa-desktop\"></i><p>Areas</p></a></li>\r\n<li class=\"nav-item\"><a href=\"./mantenimiento.php\" class=\"nav-link\"><i class=\"nav-icon fas fa-briefcase\"></i><p> Puesto de Trabajo</p></a></li>\r\n<li class=\"nav-item\"><a href=\"./grupoRiesgo.php\" class=\"nav-link\"><i class=\"nav-icon fas fa-briefcase-medical\"></i><p> Grupo de Riesgo</p></a></li>\r\n<li class=\"nav-item\"><a href=\"./perfiles.php\" class=\"nav-link\"><i class=\"nav-icon fas fa-user\"></i><p> Usuarios</p></a></li>'),
(9, 'Actividades', './actividades.php', 1, 0, '<li class=\"nav-item\">\r\n                 <a href=\"./actividades.php\" class=\"nav-link\">\r\n<i class=\"nav-icon fas far fa-list-alt\"></i><p> Actividades</p></a></li>', '<li class=\"nav-item\">\r\n                 <a href=\"./actividades.php\" class=\"nav-link\">\r\n<i class=\"nav-icon fas far fa-list-alt\"></i><p> Actividades</p></a></li>'),
(6, 'Planilla GR', './planilla.php', 1, 0, '<li class=\"nav-item\">\r\n	<a href=\"./planilla.php\" class=\"nav-link\">\r\n		<i class=\"nav-icon fa fa-map\"></i>\r\n		<p> Planilla GR\r\n                </p>\r\n	</a>\r\n</li>', '<li class=\"nav-item\">\r\n	<a href=\"./planilla.php\" class=\"nav-link  active\">\r\n		<i class=\"nav-icon fa fa-map\"></i>\r\n		<p> Planilla GR\r\n                </p>\r\n	</a>\r\n</li>'),
(7, 'Reporte Programacion', './reporte.php', 1, 0, '<li class=\"nav-item\">\r\n	<a href=\"./reporte.php\" class=\"nav-link\">\r\n		<i class=\"nav-icon fas fa-file-signature\"></i>\r\n		<p> Reporte Programacion\r\n                </p>\r\n	</a>\r\n</li>', '<li class=\"nav-item\">\r\n	<a href=\"./reporte.php\" class=\"nav-link\">\r\n		<i class=\"nav-icon fas fa-file-signature\"></i>\r\n		<p> Reporte Programacion\r\n                </p>\r\n	</a>\r\n</li>'),
(8, 'Reporte Actividad', './reporteActividad.php', 1, 0, '<li class=\"nav-item\">\r\n	<a href=\"./reporteActividad.php\" class=\"nav-link\">\r\n		<i class=\"nav-icon fas fa-file-signature\"></i>\r\n		<p> Reporte Actividad\r\n                </p>\r\n	</a>\r\n</li>', '<li class=\"nav-item\">\r\n	<a href=\"./reporteActividad.php\" class=\"nav-link\">\r\n		<i class=\"nav-icon fas fa-file-signature\"></i>\r\n		<p> Reporte Actividad\r\n                </p>\r\n	</a>\r\n</li>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_perfil`
--

CREATE TABLE `p_perfil` (
  `idperfil` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `p_perfil`
--

INSERT INTO `p_perfil` (`idperfil`, `descripcion`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'JEFE DE DEPARTAMENTO'),
(3, 'JEFE DE SERVICIO'),
(4, 'SECRETARIA'),
(5, 'PERSONAL ASISTENCIAL'),
(6, 'PERSONAL ADMINISTRATIVO'),
(7, 'ADMINISTRADOR DE PERSONAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_personal`
--

CREATE TABLE `p_personal` (
  `idpersona` int(11) NOT NULL,
  `idplaza` int(11) NOT NULL,
  `tipoplaza` int(11) DEFAULT NULL,
  `apellidopaterno` varchar(200) NOT NULL,
  `apellidomaterno` varchar(200) NOT NULL,
  `primernombre` varchar(200) NOT NULL,
  `segundonombre` varchar(200) DEFAULT NULL,
  `nombrecompleto` varchar(500) NOT NULL,
  `tipodocumento` int(11) NOT NULL,
  `nrodocumento` varchar(12) NOT NULL,
  `fechanacimiento` datetime NOT NULL,
  `idsexo` int(11) NOT NULL,
  `idestadocivil` int(11) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `ruc` varchar(11) NOT NULL,
  `idpuestotrabajo` int(11) DEFAULT NULL,
  `fechaingreso` datetime DEFAULT NULL,
  `estado` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `idarea` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_planilla`
--

CREATE TABLE `p_planilla` (
  `idplanilla` int(10) UNSIGNED NOT NULL,
  `idpersona` int(11) NOT NULL,
  `idgruporiesgo` int(11) NOT NULL,
  `idservicio` int(11) NOT NULL,
  `idarea` int(11) NOT NULL,
  `idpuestotrabajo` int(11) NOT NULL,
  `observacion` varchar(500) NOT NULL,
  `fechainicio` datetime NOT NULL,
  `fechafin` datetime NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '0' COMMENT '0 = activo 1 = inactivo',
  `usuario` varchar(15) NOT NULL,
  `perfil` varchar(15) NOT NULL,
  `equipo` varchar(15) NOT NULL,
  `fecha` datetime NOT NULL,
  `usuariomod` varchar(15) DEFAULT NULL,
  `perfilmod` varchar(15) DEFAULT NULL,
  `equipomod` varchar(15) DEFAULT NULL,
  `fechamod` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_profesion`
--

CREATE TABLE `p_profesion` (
  `idprofesion` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `estado` char(1) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `perfil` varchar(15) NOT NULL,
  `equipo` varchar(15) NOT NULL,
  `fecha` datetime NOT NULL,
  `usuariomod` varchar(15) NOT NULL,
  `perfilmod` varchar(15) DEFAULT NULL,
  `equipomod` varchar(15) DEFAULT NULL,
  `fechamod` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `p_profesion`
--

INSERT INTO `p_profesion` (`idprofesion`, `descripcion`, `estado`, `usuario`, `perfil`, `equipo`, `fecha`, `usuariomod`, `perfilmod`, `equipomod`, `fechamod`) VALUES
(1, 'ABOGADO', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(3, 'ASISTENTE SOCIAL', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(4, 'AUDITOR', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(5, 'BIOLOGO', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(8, 'CONTADOR', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(9, 'ECONOMISTA', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(10, 'ENFERMERA', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(11, 'INGENIERO', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(12, 'INGENIERO AGRONOMO', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(16, 'INGENIERO ELECTRICISTA', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(21, 'INGENIERO SANITARIO', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(22, 'INGENIERO SISTEMAS', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(24, 'MEDICO', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(27, 'MEDICO CIRUGIA GENERAL', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(29, 'MEDICO DERMATOLOGO', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(30, 'MEDICO ECOGRAFISTA', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(31, 'MEDICO ENDOCRINOLOGO', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(32, 'MEDICO GERIATRA', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(33, 'MEDICO GINECOLOGO', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(34, 'MEDICO NEFROLOGO', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(35, 'MEDICO NEUROCIRUGIA', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(36, 'MEDICO NEUROLOGO', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(38, 'MEDICO OFTALMOLOGO', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(39, 'MEDICO ONCOLOGO QUIRURGICO', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(41, 'MEDICO OTORRINO LARINGOLOGO', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(43, 'MEDICO PEDIATRA', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(45, 'MEDICO RADIOLOGO', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(46, 'MEDICO REUMATOLOGO', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(47, 'MEDICO TRAUMATOLOGO', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(48, 'MEDICO VETERINARIO', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(49, 'OBSTETRIZ', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(50, 'PERIODISTA', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(51, 'PSICOLOGO', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(52, 'QUIMICO', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(54, 'NO CONSIGNA', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(55, 'ADMINISTRACION DE EMPRESAS', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(57, 'RELACIONES PUBLICAS', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(60, 'BIBLIOTECOLOGIA', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(61, 'RELACIONES PUBLICAS', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(63, 'ARTISTA PINTOR', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(64, 'FOTOGRAFO', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(65, 'CONTABILIDAD EMPRESARIAL', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(67, 'ADMINISTRACION-SECRETAR.', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(68, 'DOCENTE EN EDUCACION', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(73, 'TRABAJO SOCIAL', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(74, 'ESTADISTICO', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(75, 'CONTABILIDAD', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(76, 'LIC. EN COMPUTACION', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(78, 'TEC.FISIOTERAPIA Y REHABILITACION', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(80, 'TECNOLOGIA SANITARIA', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(81, 'MECANICA AUTOMOTRIZ', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(82, 'TURISMO', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(83, 'ADMINISTRACION PUBLICA.', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(84, 'TECNICO EN LABOR.CLINICO', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(85, 'ENFERMERIA TECNICA', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(86, 'MEDICO CIRUJANO PEDIATRA', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(88, 'TEC.MEDICO-RADIOLOGIA', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(89, 'TECNICO EN COMPUTACION E INFORMATICA', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(91, 'ECONOMIA DE LA SALUD', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(92, 'CIENCIAS DE LA COMUNICACION', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(93, 'EN SALUD', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(94, 'TECNICO EN EDIFICACIONES Y CONST.CIVIL', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(96, 'TEC.EN CONTABILIDAD', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(98, 'CONTABILIDAD Y FINANZAS', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(99, 'TECNICO EN FARMACIA', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(100, 'MEDICINA INTEGRAL Y GESTON EN SALU', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(102, 'MAESTRIA EDUC.DOC.E INVEST.EN EDUC.SUP', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(103, 'LIC. EN EDUCACION PRIMARIA', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(104, 'LICENCIATURA EN GESTION', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(107, 'NEONATOLOGIA', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(108, 'MAESTRIA SALUD PUBLICA', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(109, 'MAESTRIA EN SALUD OCUPACIONAL', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(110, 'LIC. EN ADMINISTRACION', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(111, 'ODONTOLOGO', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(113, 'DOCTORADO EN SALUD PUBLICA', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(114, 'TEC.EN NUTRICION', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(115, 'MAESTRIA ADMINISTRACION MENCION FINANZAS', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(116, 'LIC. EN EDUCACION', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(117, 'DOCTOR EN EDUCACION', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', ''),
(118, 'MAESTRIA ADMINISTR.SERVIC.DE SALUD', 'A', '', '', '', '1900-01-01 00:00:00', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_puestotrabajo`
--

CREATE TABLE `p_puestotrabajo` (
  `idpuesto` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `estado` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `usuario` varchar(15) DEFAULT NULL,
  `perfil` varchar(15) DEFAULT NULL,
  `equipo` varchar(15) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `usuariomod` varchar(15) DEFAULT NULL,
  `perfilmod` varchar(15) DEFAULT NULL,
  `equipomod` varchar(15) DEFAULT NULL,
  `fechamod` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `p_puestotrabajo`
--

INSERT INTO `p_puestotrabajo` (`idpuesto`, `descripcion`, `estado`, `usuario`, `perfil`, `equipo`, `fecha`, `usuariomod`, `perfilmod`, `equipomod`, `fechamod`) VALUES
(1, 'ABOGADO', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'ARTESANO', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'ASIST. EN SERV. SOCIAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'ASIST. SERV. TRANSPORTE', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'ASISTENTE ADMINISTRATIVO', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'ASISTENTE DE SEGURIDAD', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'ASISTENTE EN ODONTOLOGIA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'ASISTENTE PROFESIONAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'ASISTENTE SOCIAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'AUX. DE ENFERMERIA ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'AUX. DE LABORATORIO', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'AUX. DE LAVANDERIA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'AUX. DE NUTRICION', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'AUX. DE SIST.ADMINISTRATIVOS', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'AUXILIAR ADMINISTRATIVO', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'AUXILIAR ASISTENCIAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'AUXILIAR EN ARCHIVO', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'AUXILIAR EN MECANICA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'AUXILIAR INFORMATICO', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'BIOLOGO', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'CAJERO', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'CAPELLAN ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'CHOFER', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'CIRUJANO DENTISTA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'CONTADOR', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'CUARTELERO', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'DIGITADOR', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'DIRECTOR EJECUTIVO', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'EDUCADORA PARA LA SALUD', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'ELECTRICISTA ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'ENFERMERA/O', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'ESPECIALISTA ADM. ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'ESPECIALISTA EN SALUD', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'ESTADISTICO ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'INGENIERO CIVIL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'INGENIERO DE SISTEMAS', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'INGENIERO ELECTRONICO', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'INGENIERO ESTADISTISTA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'INGENIERO ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'JEFE DE OFICINA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'MECANICO ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'MEDICO', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'MEDICO AUDITOR', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'MEDICO ESPECIALISTA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'MEDICO RESIDENTE 1ER A?O', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 'MEDICO SUB ESPECIALIDAD', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'NUTRICIONISTA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 'OBSTETRIZ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 'OPER.CENTRAL TELEFONICA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 'OPERAD. DE EQUIPO MECANICO', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 'OPERAD. DE MAQ. INDUSTRIAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'OPERADOR P.A.D. I', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 'PROGRAMADOR', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 'PSICOLOGO', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 'QUIMICO FARMACEUTICO', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 'SECRETARIA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 'TEC. CARPINTERO', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 'TEC. EN BIBLIOTECA ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 'TEC. EN COMUNICACION', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 'TEC. EN EBANISTERIA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 'TEC. EN INGENIERIA ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 'TEC. GASFITERO', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 'TEC.ADMINISTRATIVO', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 'TEC.ELECTRICISTA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, 'TEC.EN SERVICIO SOCIAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 'TECNICO DENTAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, 'TECNICO EN ARCHIVO', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, 'TECNICO EN COMPUTACION', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 'TECNICO EN ECONOMIA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 'TECNICO EN ENFERMERIA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 'TECNICO EN ESTADISTICA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, 'TECNICO EN FARMACIA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, 'TECNICO EN LABORATORIO', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 'TECNICO EN MANTENIMIENTO', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 'TECNICO EN NUTRICION', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, 'TECNICO EN RED Y PCS', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 'TECNICO EN SANITARIO', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 'TECNICO INFORMATICO', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 'TECNOLOGO MEDICO', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 'TRABAJADORA SOCIAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_rolprogramacion`
--

CREATE TABLE `p_rolprogramacion` (
  `idrol` int(10) UNSIGNED NOT NULL,
  `idplanilla` int(10) UNSIGNED NOT NULL,
  `periodo` int(10) UNSIGNED NOT NULL,
  `mes` int(10) UNSIGNED NOT NULL,
  `dia` int(10) UNSIGNED NOT NULL,
  `idturno` int(10) UNSIGNED NOT NULL,
  `idhora` int(10) UNSIGNED NOT NULL,
  `idarea` int(10) UNSIGNED NOT NULL,
  `idtipomodalidad` int(10) UNSIGNED NOT NULL,
  `horaIngreso` varchar(5) NOT NULL,
  `horaegreso` varchar(5) NOT NULL,
  `fechahoraingreso` datetime DEFAULT NULL,
  `fechahoraegreso` datetime DEFAULT NULL,
  `idusuarioregistra` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `fecharegistro` datetime DEFAULT NULL,
  `idusuarioautoriza` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `fechaautoriza` datetime DEFAULT NULL,
  `idestado` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `idestado1` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `nrohoras` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_servicio`
--

CREATE TABLE `p_servicio` (
  `idservicio` int(11) NOT NULL,
  `idundorganizacional` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `estado` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `usuario` varchar(15) DEFAULT NULL,
  `perfil` varchar(15) DEFAULT NULL,
  `equipo` varchar(15) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `usuariomod` varchar(15) DEFAULT NULL,
  `perfilmod` varchar(15) DEFAULT NULL,
  `equipomod` varchar(15) DEFAULT NULL,
  `fechamod` datetime DEFAULT NULL,
  `color` varchar(45) NOT NULL,
  `background` varchar(45) NOT NULL,
  `clase` varchar(45) NOT NULL,
  `clase2` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `p_servicio`
--

INSERT INTO `p_servicio` (`idservicio`, `idundorganizacional`, `descripcion`, `estado`, `usuario`, `perfil`, `equipo`, `fecha`, `usuariomod`, `perfilmod`, `equipomod`, `fechamod`, `color`, `background`, `clase`, `clase2`) VALUES
(1, 1, 'DPTO. DE ENFERMERIA (JEFATURA)', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'white', '#62D97D', 'color-1', 'color-1'),
(2, 1, 'ENF. CENTRAL ESTERILIZACION', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(3, 1, 'ENF. CENTRO QUIRURGICO', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(4, 1, 'ENF. CIRUGIA PEDIATRICA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(5, 1, 'ENF. CONSULTA EXTERNA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(6, 1, 'ENF. EMERGENCIA Y CUIDADO', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(7, 1, 'ENF. GINECO OBSTETRICIA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(8, 1, 'ENF. HOSPITALIZACION G.O.', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(9, 1, 'ENF. HOSPITALIZACION M.P.', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(10, 1, 'ENF. NEONATOLOGIA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(11, 1, 'ENF. PROGRAMAS', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(12, 1, 'ENF. U.C.CRITICOS MUJER', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(13, 1, 'ENF. UCI NEO', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(14, 1, 'ENF. UCI PEDIATRICO', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(15, 1, 'ENF. UTIP', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(16, 1, 'ENFERMERIA SUPERVISION', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(17, 1, 'OFICINA DE SEGUROS', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(18, 2, 'SERVICIO DE CENTRO QUIRUR', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(19, 3, 'EQUIPO DE LABORATORIO DE', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(20, 3, 'EQUIPO DE RADIODIAGNOSTIC', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(21, 3, 'SERVICIO DE ANATOMIA PATO', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(22, 3, 'SERVICIO DE DIAGNOSTICO P', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(23, 3, 'SERVICIO DE PATOLOGIA CLI', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(24, 4, 'CIRUGIA PEDIATRICA, ORTOP', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(25, 4, 'DPTO.CIRUGIA PEDIATRICA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(26, 4, 'EQUIPO DE OFTALMOLOGIA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(27, 4, 'SERVICIO DE CIRUGIA ESPEC', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(28, 5, 'EQ. DE FARMACOLOGIA CLINI', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(29, 5, 'EQ. DE HOSPITALIZACION Y', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(30, 5, 'EQ.DE DISPENSACION Y CTRL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(31, 5, 'EQUIPO DE EMERGENCIA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(32, 5, 'EQUIPO DE HOSPITALIZACION', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(33, 5, 'EQUIPO DE PROMOCION Y CAM', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(34, 5, 'SERV.FARMACIA EMERG.', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(35, 5, 'SERVICIO DE FARMACIA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(36, 5, 'SERVICIO DE NUTRICION Y D', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(37, 5, 'SERVICIO DE PSICOLOGIA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(38, 5, 'SERVICIO DE TRABAJO SOCIA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(39, 6, 'SERVICIO DE CUIDADO CRITI', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(40, 6, 'SERVICIO DE CUIDADOS CRIT', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(41, 6, 'SERVICIO DE EMERGENCIA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(42, 6, 'SERVICIO DE TRANSPORTE', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(43, 7, 'MEDICINA FISICA Y REHABIL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(44, 7, 'PEDIATRIA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(45, 7, 'SERVICIO DE LACTANTES', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(46, 7, 'SERVICIO DE NEONATOLOGIA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(47, 7, 'SERVICIO DE SUB-ESPECIALI', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(48, 7, 'SERVICIOS DEL NI?O', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(49, 8, 'SERV.GINECOLOGIA ONCOLOGI', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(50, 8, 'SERV.MEDICINA ESPECIALIZA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(51, 8, 'SERVICIO DE GINECOLOGIA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(52, 8, 'SERVICIO DE MEDICINA MATE', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(53, 8, 'SERVICIO DE OBSTETRICIA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(54, 8, 'UNIDAD DE BRONCOPULMONAR', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(55, 9, 'SERV.ODONTOLOGIA DE LA MUJER', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(56, 10, 'DIRECCION GENERAL (JEFATU', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(57, 10, 'EQUIPO DE ARCHIVO CENTRAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(58, 10, 'EQUIPO DE ASISTENCIA A LA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(59, 10, 'EQUIPO DE INTERV.DE EMERG', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(60, 10, 'EQUIPO DE TRAMITE DOCUMEN', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(61, 11, '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(62, 12, '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(63, 13, 'UNIDAD DE RR.PP.', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(64, 14, 'EQ.TESORERIA AREA CAJA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(65, 14, 'EQUIPO DE CONTROL PREVIO', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(66, 14, 'EQUIPO DE CUENTA CORRIENT', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(67, 14, 'EQUIPO DE INTEGRACION CON', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(68, 14, 'EQUIPO DE TESORERIA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(69, 14, 'EQUIPO LIQUIDACIONES', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(70, 15, '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(71, 16, 'EQUIPO DE ADMISION', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(72, 16, 'EQUIPO DE ARCHIVO', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(73, 16, 'EQUIPO DE INFORMATICA Y SISTEMAS', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(74, 16, 'EQUIPO ESTADISTICA Y BASE', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(75, 17, '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(76, 18, 'EQUIPO DE ADQUISICIONES', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(77, 18, 'EQUIPO DE ALMACEN', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(78, 18, 'EQUIPO DE CONTROL PATRIMO', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(79, 18, 'EQUIPO DE PROGRAMACION', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(80, 19, 'EQUIPO CAPACITACION Y DES', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(81, 19, 'EQUIPO DE ADMINISTRACION', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(82, 19, 'EQUIPO DE BIENESTAR SOCIAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(83, 19, 'EQUIPO DE CONTROL DE ASISTENCIA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(84, 19, 'EQUIPO DE PROGRAMACION DE PERSONAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(85, 19, 'EQUIPO DE REMUNERACIONES', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(86, 19, 'EQUIPO DE SEGURIDAD Y SALUD', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(87, 20, 'EQUIPO DE AUDITORIA MEDIC', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(88, 20, 'EQUIPO DE GESTION ADM.DE', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(89, 21, 'EQUIPO DE COSTURA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(90, 21, 'EQUIPO DE GEST.TECNOL.DE', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(91, 21, 'EQUIPO DE IMPRENTA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(92, 21, 'EQUIPO DE LAVANDERIA Y ROPERIA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(93, 22, 'EQUIPOS DE PROYECTOS DE INVERSION', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', ''),
(94, 23, '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_sexo`
--

CREATE TABLE `p_sexo` (
  `idsexo` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `p_sexo`
--

INSERT INTO `p_sexo` (`idsexo`, `descripcion`, `estado`) VALUES
(1, 'Masculino', 'A'),
(2, 'Femenino', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_tipogruporiesgo`
--

CREATE TABLE `p_tipogruporiesgo` (
  `idtipogruporiesgo` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `estado` char(1) DEFAULT NULL,
  `perfil` varchar(15) NOT NULL,
  `equipo` varchar(15) NOT NULL,
  `fecha` datetime NOT NULL,
  `usuariomod` varchar(15) DEFAULT NULL,
  `perfilmod` varchar(15) DEFAULT NULL,
  `equipomod` varchar(15) DEFAULT NULL,
  `fechamod` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `p_tipogruporiesgo`
--

INSERT INTO `p_tipogruporiesgo` (`idtipogruporiesgo`, `descripcion`, `usuario`, `estado`, `perfil`, `equipo`, `fecha`, `usuariomod`, `perfilmod`, `equipomod`, `fechamod`) VALUES
(1, 'MAYOR A', '', '', '', '', '2021-06-11 00:00:00', NULL, NULL, NULL, NULL),
(2, 'MENOR A', '', '', '', '', '2021-06-11 00:00:00', NULL, NULL, NULL, NULL),
(3, 'l', '', '', '', '', '2021-06-11 00:00:00', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_tipomodalidadtrabajo`
--

CREATE TABLE `p_tipomodalidadtrabajo` (
  `idtipomodalidad` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `estado` int(10) UNSIGNED DEFAULT NULL,
  `usuario` varchar(15) NOT NULL,
  `perfil` varchar(15) NOT NULL,
  `equipo` varchar(15) NOT NULL,
  `fecha` datetime NOT NULL,
  `usuariomod` varchar(15) DEFAULT NULL,
  `perfilmod` varchar(15) DEFAULT NULL,
  `equipomod` varchar(15) DEFAULT NULL,
  `fechamod` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `p_tipomodalidadtrabajo`
--

INSERT INTO `p_tipomodalidadtrabajo` (`idtipomodalidad`, `descripcion`, `estado`, `usuario`, `perfil`, `equipo`, `fecha`, `usuariomod`, `perfilmod`, `equipomod`, `fechamod`) VALUES
(1, 'Remoto', 0, '', '', '', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(2, 'Licencia', 0, '', '', '', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(3, 'Presencial', 0, '', '', '', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_tipoplaza`
--

CREATE TABLE `p_tipoplaza` (
  `idtipoplaza` int(11) NOT NULL,
  `descripcion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `p_tipoplaza`
--

INSERT INTO `p_tipoplaza` (`idtipoplaza`, `descripcion`) VALUES
(1, 'Nombrado'),
(2, 'Cas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_turnos`
--

CREATE TABLE `p_turnos` (
  `idturno` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `sigla` varchar(4) NOT NULL,
  `horaInicio` varchar(5) DEFAULT NULL,
  `horafin` varchar(5) DEFAULT NULL,
  `horas` int(10) UNSIGNED NOT NULL,
  `idestado` int(10) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `p_turnos`
--

INSERT INTO `p_turnos` (`idturno`, `nombre`, `sigla`, `horaInicio`, `horafin`, `horas`, `idestado`) VALUES
(1, 'Turno dia (12 Horas)', 'GD', NULL, NULL, 12, 0),
(2, 'Turno noche (12 Horas)', 'GN', NULL, NULL, 12, 0),
(3, 'Guardia 24 Horas', 'G24', NULL, NULL, 24, 0),
(4, 'Medio Dia (6 Horas)', 'MD', NULL, NULL, 6, 0),
(5, 'Medio Tarde (6 Horas)', 'MT', NULL, NULL, 6, 0),
(6, 'Dia (8 horas)', 'D8', NULL, NULL, 8, 0),
(7, 'Dia (8 Horas)', 'D9', NULL, NULL, 9, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_unidadfuncional`
--

CREATE TABLE `p_unidadfuncional` (
  `idundfuncional` int(11) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `estado` int(10) UNSIGNED DEFAULT 0,
  `usuario` varchar(15) DEFAULT NULL,
  `perfil` varchar(15) DEFAULT NULL,
  `equipo` varchar(15) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `usuariomod` varchar(15) DEFAULT NULL,
  `perfilmod` varchar(15) DEFAULT NULL,
  `equipomod` varchar(15) DEFAULT NULL,
  `fechamod` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `p_unidadfuncional`
--

INSERT INTO `p_unidadfuncional` (`idundfuncional`, `descripcion`, `estado`, `usuario`, `perfil`, `equipo`, `fecha`, `usuariomod`, `perfilmod`, `equipomod`, `fechamod`) VALUES
(1, 'EMERGENCIA', 0, 'USUARIO', 'PERFIL', 'EQUIPO', '2021-06-27 00:00:00', NULL, NULL, NULL, NULL),
(2, 'PEDIATRIA', 0, 'USUARIO', 'PERFIL', 'EQUIPO', '2021-06-27 00:00:00', NULL, NULL, NULL, NULL),
(3, 'GINECOLOGIA', 0, 'USUARIO', 'PERFIL', 'EQUIPO', '2021-06-27 00:00:00', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_unidadorganizacional`
--

CREATE TABLE `p_unidadorganizacional` (
  `idundorganizacional` int(11) NOT NULL,
  `tipo` int(10) UNSIGNED NOT NULL COMMENT '1= unidad organica 2= unidad funcional',
  `descripcion` varchar(200) DEFAULT NULL,
  `estado` int(10) UNSIGNED DEFAULT 0,
  `usuario` varchar(15) DEFAULT NULL,
  `perfil` varchar(15) DEFAULT NULL,
  `equipo` varchar(15) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `usuariomod` varchar(15) DEFAULT NULL,
  `perfilmod` varchar(15) DEFAULT NULL,
  `equipomod` varchar(15) DEFAULT NULL,
  `fechamod` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `p_unidadorganizacional`
--

INSERT INTO `p_unidadorganizacional` (`idundorganizacional`, `tipo`, `descripcion`, `estado`, `usuario`, `perfil`, `equipo`, `fecha`, `usuariomod`, `perfilmod`, `equipomod`, `fechamod`) VALUES
(1, 0, 'DPTO. DE ENFERMERIA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 0, 'DPTO.ANESTESIOLOGIA Y CENTRO QUIRURGICO', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 0, 'DPTO.AYUDA AL DIAGNOSTICO', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 0, 'DPTO.CIRUGIA PEDIATRICA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 0, 'DPTO.DE APOYO AL TRATAMIENTO', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 0, 'DPTO.DE EMERGENCIA Y CUIDADOS', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 0, 'DPTO.DE PEDIATRIA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 0, 'DPTO.GINECO OBSTETRICIA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 0, 'DPTO.ODONTOESTOMATOLOGIA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 0, 'DIRECCION GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 0, 'OFICINA DE APOYO A LA DOCENCIA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 0, 'OFICINA DE ASESORIA JURIDICA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 0, 'OFICINA DE COMUNICACIONES', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 0, 'OFICINA DE ECONOMIA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 0, 'OFICINA DE EPIDEMIOLOGIA Y SALUD', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 0, 'OFICINA DE ESTADISTICA E INFORMATICA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 0, 'OFICINA DE GESTION DE LA CALIDAD', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 0, 'OFICINA DE LOGISTICA', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 0, 'OFICINA DE PERSONAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 0, 'OFICINA DE SEGUROS', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 0, 'OFICINA DE SERVICIOS GENERALES', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 0, 'OFICINA EJECUTIVA DE PLANEAMIENTO', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 0, 'ORGANO DE CONTROL INSTITUCIONAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_usuario`
--

CREATE TABLE `p_usuario` (
  `idusuario` int(11) NOT NULL,
  `dni` varchar(200) NOT NULL,
  `clave` varchar(200) NOT NULL,
  `nombreusuario` varchar(500) NOT NULL,
  `idestado` int(10) UNSIGNED NOT NULL,
  `idperfil` int(10) UNSIGNED NOT NULL,
  `avatar` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `p_usuario`
--

INSERT INTO `p_usuario` (`idusuario`, `dni`, `clave`, `nombreusuario`, `idestado`, `idperfil`, `avatar`) VALUES
(1, '99999999', '99999999', 'ADMINISTRADOR', 1, 1, '../dist/img/user2-160x160.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `p_accesosmenu`
--
ALTER TABLE `p_accesosmenu`
  ADD PRIMARY KEY (`idacceso`),
  ADD KEY `Index_2` (`idperfil`),
  ADD KEY `Index_3` (`idmenu`);

--
-- Indices de la tabla `p_actividad`
--
ALTER TABLE `p_actividad`
  ADD PRIMARY KEY (`idactividad`);

--
-- Indices de la tabla `p_actividades`
--
ALTER TABLE `p_actividades`
  ADD PRIMARY KEY (`idactividades`) USING BTREE;

--
-- Indices de la tabla `p_area`
--
ALTER TABLE `p_area`
  ADD PRIMARY KEY (`idarea`) USING BTREE;

--
-- Indices de la tabla `p_cargo`
--
ALTER TABLE `p_cargo`
  ADD PRIMARY KEY (`idcargo`);

--
-- Indices de la tabla `p_diassemana`
--
ALTER TABLE `p_diassemana`
  ADD PRIMARY KEY (`iddia`);

--
-- Indices de la tabla `p_especialidad`
--
ALTER TABLE `p_especialidad`
  ADD PRIMARY KEY (`idespecialidad`);

--
-- Indices de la tabla `p_estadocivil`
--
ALTER TABLE `p_estadocivil`
  ADD PRIMARY KEY (`idestadocivil`);

--
-- Indices de la tabla `p_gruporiesgo`
--
ALTER TABLE `p_gruporiesgo`
  ADD PRIMARY KEY (`idgruporiesgo`);

--
-- Indices de la tabla `p_horaingreso`
--
ALTER TABLE `p_horaingreso`
  ADD PRIMARY KEY (`idhoraingreso`),
  ADD UNIQUE KEY `Index_U` (`idturno`,`idhora`);

--
-- Indices de la tabla `p_horas`
--
ALTER TABLE `p_horas`
  ADD PRIMARY KEY (`idhora`);

--
-- Indices de la tabla `p_menu`
--
ALTER TABLE `p_menu`
  ADD PRIMARY KEY (`idmenu`);

--
-- Indices de la tabla `p_perfil`
--
ALTER TABLE `p_perfil`
  ADD PRIMARY KEY (`idperfil`);

--
-- Indices de la tabla `p_personal`
--
ALTER TABLE `p_personal`
  ADD PRIMARY KEY (`idpersona`,`idplaza`) USING BTREE;

--
-- Indices de la tabla `p_planilla`
--
ALTER TABLE `p_planilla`
  ADD PRIMARY KEY (`idplanilla`);

--
-- Indices de la tabla `p_profesion`
--
ALTER TABLE `p_profesion`
  ADD PRIMARY KEY (`idprofesion`);

--
-- Indices de la tabla `p_puestotrabajo`
--
ALTER TABLE `p_puestotrabajo`
  ADD PRIMARY KEY (`idpuesto`);

--
-- Indices de la tabla `p_rolprogramacion`
--
ALTER TABLE `p_rolprogramacion`
  ADD PRIMARY KEY (`idrol`),
  ADD UNIQUE KEY `Index_U` (`idplanilla`,`periodo`,`mes`,`dia`);

--
-- Indices de la tabla `p_servicio`
--
ALTER TABLE `p_servicio`
  ADD PRIMARY KEY (`idservicio`);

--
-- Indices de la tabla `p_sexo`
--
ALTER TABLE `p_sexo`
  ADD PRIMARY KEY (`idsexo`);

--
-- Indices de la tabla `p_tipogruporiesgo`
--
ALTER TABLE `p_tipogruporiesgo`
  ADD PRIMARY KEY (`idtipogruporiesgo`);

--
-- Indices de la tabla `p_tipomodalidadtrabajo`
--
ALTER TABLE `p_tipomodalidadtrabajo`
  ADD PRIMARY KEY (`idtipomodalidad`);

--
-- Indices de la tabla `p_tipoplaza`
--
ALTER TABLE `p_tipoplaza`
  ADD PRIMARY KEY (`idtipoplaza`);

--
-- Indices de la tabla `p_turnos`
--
ALTER TABLE `p_turnos`
  ADD PRIMARY KEY (`idturno`);

--
-- Indices de la tabla `p_unidadfuncional`
--
ALTER TABLE `p_unidadfuncional`
  ADD PRIMARY KEY (`idundfuncional`);

--
-- Indices de la tabla `p_unidadorganizacional`
--
ALTER TABLE `p_unidadorganizacional`
  ADD PRIMARY KEY (`idundorganizacional`) USING BTREE;

--
-- Indices de la tabla `p_usuario`
--
ALTER TABLE `p_usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `p_accesosmenu`
--
ALTER TABLE `p_accesosmenu`
  MODIFY `idacceso` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `p_actividad`
--
ALTER TABLE `p_actividad`
  MODIFY `idactividad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `p_actividades`
--
ALTER TABLE `p_actividades`
  MODIFY `idactividades` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `p_area`
--
ALTER TABLE `p_area`
  MODIFY `idarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT de la tabla `p_diassemana`
--
ALTER TABLE `p_diassemana`
  MODIFY `iddia` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `p_gruporiesgo`
--
ALTER TABLE `p_gruporiesgo`
  MODIFY `idgruporiesgo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `p_horaingreso`
--
ALTER TABLE `p_horaingreso`
  MODIFY `idhoraingreso` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `p_horas`
--
ALTER TABLE `p_horas`
  MODIFY `idhora` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `p_menu`
--
ALTER TABLE `p_menu`
  MODIFY `idmenu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `p_perfil`
--
ALTER TABLE `p_perfil`
  MODIFY `idperfil` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `p_personal`
--
ALTER TABLE `p_personal`
  MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `p_planilla`
--
ALTER TABLE `p_planilla`
  MODIFY `idplanilla` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `p_puestotrabajo`
--
ALTER TABLE `p_puestotrabajo`
  MODIFY `idpuesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de la tabla `p_rolprogramacion`
--
ALTER TABLE `p_rolprogramacion`
  MODIFY `idrol` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `p_servicio`
--
ALTER TABLE `p_servicio`
  MODIFY `idservicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT de la tabla `p_turnos`
--
ALTER TABLE `p_turnos`
  MODIFY `idturno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `p_unidadorganizacional`
--
ALTER TABLE `p_unidadorganizacional`
  MODIFY `idundorganizacional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `p_usuario`
--
ALTER TABLE `p_usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
