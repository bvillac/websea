CREATE  TABLE IF NOT EXISTS `VSValidacion` (
  `Idvalidacion` INT(10) NOT NULL AUTO_INCREMENT ,
  `Validacion` TEXT NULL ,
  `Codigo` VARCHAR(2) NULL ,
  `Estado` VARCHAR(1) NULL ,
  PRIMARY KEY (`Idvalidacion`) )
ENGINE = InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE  TABLE IF NOT EXISTS `VSValidacion_Mensajes` (
  `Idvalmen` INT(20) NOT NULL ,
  `Codigo` INT(3) NULL ,
  `Descripcion` TEXT NULL ,
  `Solucion` TEXT NULL ,
  `Estado` VARCHAR(1) NULL ,
  `VSValidacion_Idvalidacion` INT(10) NOT NULL ,
  PRIMARY KEY (`Idvalmen`) ,
  INDEX `fk_VSValidacion_Mensajes_VSValidacion1_idx` (`VSValidacion_Idvalidacion` ASC) ,
  CONSTRAINT `fk_VSValidacion_Mensajes_VSValidacion1`
    FOREIGN KEY (`VSValidacion_Idvalidacion` )
    REFERENCES `VSValidacion` (`Idvalidacion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE  TABLE IF NOT EXISTS `VSRetencion` (
  `Idretencion` INT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  `Idimpreten` INT(20) NOT NULL ,
  `Retencion` TEXT NULL ,
  `Codigo` VARCHAR(2) NULL ,
  `Estado` VARCHAR(1) NULL ,
   FOREIGN KEY (`Idimpreten` ) REFERENCES `VSImpuestoRetencion` (`Idimpreten` )
) ENGINE = InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE  TABLE IF NOT EXISTS `VSTarifa` (
  `Idtarifa` INT(20) NOT NULL AUTO_INCREMENT ,
  `Idimpuesto` INT(20) NOT NULL ,
  `Codigo` VARCHAR(5) NULL ,
  `Tarifa` TEXT NULL ,
  `Porcentaje` DECIMAL(5,2) NULL ,
  `Grupo` VARCHAR(2) NULL ,
  `Estado` VARCHAR(1) NULL ,
  PRIMARY KEY (`Idtarifa`) ,
  INDEX `fk_VSTarifa_VSImpuesto1_idx` (`Idimpuesto` ASC) ,
  CONSTRAINT `fk_VSTarifa_VSImpuesto1`
    FOREIGN KEY (`Idimpuesto` )
    REFERENCES `VSImpuesto` (`Idimpuesto` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE  TABLE IF NOT EXISTS `VSImpuestoRetencion` (
  `Idimpreten` INT(20) NOT NULL AUTO_INCREMENT ,
  `Idimpuesto` INT(20) NOT NULL ,
  `Impuesto` VARCHAR(60) NULL ,
  `Codigo` VARCHAR(2) NULL ,
  `Estado` VARCHAR(1) NULL ,
  PRIMARY KEY (`Idimpreten`) ,
  INDEX `fk_VSImpuestoRetencion_VSImpuesto1_idx` (`Idimpuesto` ASC) ,
  CONSTRAINT `fk_VSImpuestoRetencion_VSImpuesto1`
    FOREIGN KEY (`Idimpuesto` )
    REFERENCES `VSImpuesto` (`Idimpuesto` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE  TABLE IF NOT EXISTS `VSImpuesto` (
  `Idimpuesto` INT(20) NOT NULL AUTO_INCREMENT ,
  `Impuesto` VARCHAR(80) NULL ,
  `Codigo` VARCHAR(2) NULL ,
  `Estado` VARCHAR(1) NULL ,
  PRIMARY KEY (`Idimpuesto`) )
ENGINE = InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


#########################################33

CREATE  TABLE IF NOT EXISTS `VSDirectorio` (
  `IdDirectorio` INT(10) NOT NULL AUTO_INCREMENT ,
  `EMP_ID` BIGINT(20) NOT NULL ,
  `TipoDocumento` VARCHAR(3) NULL ,
  `Descripcion` VARCHAR(100) NULL ,
  `Ruta` VARCHAR(100) NULL ,
  `UsuarioCreacion` INT(10) NULL ,
  `FechaCreacion` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
  `Estado` VARCHAR(1) NULL ,
  PRIMARY KEY (`IdDirectorio`) ,
  INDEX `fk_VSDirectorio_EMPRESA1_idx` (`EMP_ID` ASC) ,
  CONSTRAINT `fk_VSDirectorio_EMPRESA1`
    FOREIGN KEY (`EMP_ID` )
    REFERENCES `EMPRESA` (`EMP_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE  TABLE IF NOT EXISTS `VSFirmaDigital` (
  `Id` INT(20) NOT NULL AUTO_INCREMENT ,
  `EMP_ID` BIGINT(20) NOT NULL ,
  `Clave` VARCHAR(100) NULL DEFAULT NULL ,
  `RutaFile` VARCHAR(100) NULL DEFAULT NULL ,
  `RutaFileCrt` VARCHAR(100) NULL DEFAULT NULL ,
  `FechaCaducidad` DATE NULL DEFAULT NULL ,
  `EmpresaCertificadora` VARCHAR(100) NULL DEFAULT NULL ,
  `Estado` VARCHAR(1) NULL ,
  `UsuarioCreacion` INT(10) NULL DEFAULT NULL ,
  `FechaCreacion` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
  `FechaModificacion` TIMESTAMP NULL DEFAULT NULL ,
  PRIMARY KEY (`Id`) ,
  INDEX `fk_VSFirmaDigital_EMPRESA1_idx` (`EMP_ID` ASC) )
ENGINE = InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE  TABLE IF NOT EXISTS `VSServidorCorreo` (
  `Id` INT(10) NOT NULL AUTO_INCREMENT ,
  `EMP_ID` BIGINT(20) NOT NULL ,
  `Mail` VARCHAR(100) NULL ,
  `NombreMostrar` VARCHAR(200) NULL ,
  `Asunto` TEXT NULL ,
  `Cuerpo` TEXT NULL ,
  `EsHtml` VARCHAR(1) NULL ,
  `Clave` VARCHAR(25) NULL ,
  `Usuario` VARCHAR(100) NULL ,
  `SMTPServidor` VARCHAR(100) NULL ,
  `SMTPPuerto` INT(10) NULL ,
  `TiempoRespuesta` INT(10) NULL ,
  `TiempoEspera` INT(10) NULL ,
  `ServidorAcuse` TEXT NULL ,
  `ActivarAcuse` INT(1) NULL ,
  `CCO` VARCHAR(100) NULL ,
  `UsuarioCreacion` INT(10) NULL ,
  `FechaCreacion` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
  `FechaModificacion` TIMESTAMP NULL ,
  `Estado` VARCHAR(1) NULL ,
  PRIMARY KEY (`Id`) ,
  INDEX `fk_VSServidorCorreo_EMPRESA1_idx` (`EMP_ID` ASC) ,
  CONSTRAINT `fk_VSServidorCorreo_EMPRESA1`
    FOREIGN KEY (`EMP_ID` )
    REFERENCES `EMPRESA` (`EMP_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE  TABLE IF NOT EXISTS `VSClaveContingencia` (
  `Id` INT(20) NOT NULL AUTO_INCREMENT ,
  `EMP_ID` BIGINT(20) NOT NULL ,
  `Clave` VARCHAR(50) NULL ,
  `Documento` VARCHAR(2) NULL ,
  `FechaUso` DATETIME NULL ,
  `Estado` VARCHAR(1) NULL ,
  `FechaIngreso` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
  PRIMARY KEY (`Id`) ,
  INDEX `fk_VSClaveContingencia_EMPRESA1_idx` (`EMP_ID` ASC) ,
  CONSTRAINT `fk_VSClaveContingencia_EMPRESA1`
    FOREIGN KEY (`EMP_ID` )
    REFERENCES `EMPRESA` (`EMP_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE  TABLE IF NOT EXISTS `VSServiciosSRI` (
  `Id` INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `EMP_ID` BIGINT(20) NOT NULL ,
  `Ambiente` VARCHAR(1) NULL ,
  `Recepcion` VARCHAR(200) NULL DEFAULT NULL ,
  `Autorizacion` VARCHAR(200) NULL DEFAULT NULL ,
  `RecepcionLote` VARCHAR(100) NULL DEFAULT NULL ,
  `TiempoRespuesta` INT(10) NULL DEFAULT 0 ,
  `TiempoSincronizacion` INT(10) NULL DEFAULT 0 ,
  `UsuarioCreacion` VARCHAR(45) NULL ,
  `FechaCreacion` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
  `FechaModificacion` TIMESTAMP NULL ,
  `Estado` VARCHAR(1) NULL ,
   FOREIGN KEY (`EMP_ID` ) REFERENCES `EMPRESA` (`EMP_ID` )
)ENGINE = InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE  TABLE IF NOT EXISTS `VSFormaPago` (
  `IdForma` BIGINT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  `FormaPago` VARCHAR(100) NULL ,
  `Codigo` VARCHAR(2) NULL ,
  `Estado` VARCHAR(1) NULL,
  `FechaInicio` DATE NULL,
  `FechaFin` DATE NULL
)ENGINE = InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE  TABLE IF NOT EXISTS `VSSEAINTERMEDIA`.`NubeFacturaFormaPago` (
  `IdFormaPagoFact` BIGINT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `IdForma` BIGINT(20) NOT NULL ,
  `IdFactura` BIGINT(19) NOT NULL ,
  `FormaPago` VARCHAR(2) NULL ,
  `Total` DECIMAL(14,4) NULL ,
  `Plazo` INT(5) NULL ,
  `UnidadTiempo` VARCHAR(10) NULL ,
   FOREIGN KEY (`IdFactura` ) REFERENCES `VSSEAINTERMEDIA`.`NubeFactura` (`IdFactura` ),
   FOREIGN KEY (`IdForma` ) REFERENCES `VSSEAINTERMEDIA`.`VSFormaPago` (`IdForma` )
)ENGINE = InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

########################################################

INSERT INTO `APPWEB`.`VSServiciosSRI` (`EMP_ID`, `Ambiente`, `Recepcion`, `Autorizacion`, `RecepcionLote`, `TiempoRespuesta`, `TiempoSincronizacion`, `UsuarioCreacion`, `Estado`) VALUES ('1', '1', 'https://celcer.sri.gob.ec/comprobantes-electronicos-ws/RecepcionComprobantes?wsdl', 'https://celcer.sri.gob.ec/comprobantes-electronicos-ws/AutorizacionComprobantes?wsdl', 'https://celcer.sri.gob.ec/comprobantes-electronicos-ws/RecepcionLoteMasivo?wsdl', '5', '10', 'bvillacreses', '1');
INSERT INTO `APPWEB`.`VSServiciosSRI` (`EMP_ID`, `Ambiente`, `Recepcion`, `Autorizacion`, `RecepcionLote`, `TiempoRespuesta`, `TiempoSincronizacion`, `UsuarioCreacion`, `Estado`) VALUES ('1', '2', 'https://cel.sri.gob.ec/comprobantes-electronicos-ws/RecepcionComprobantes?wsdl', 'https://cel.sri.gob.ec/comprobantes-electronicos-ws/AutorizacionComprobantes?wsdl', 'https://cel.sri.gob.ec/comprobantes-electronicos-ws/AutorizacionComprobantes?wsdl', '5', '10', 'bvillacreses', '1');


INSERT INTO `APPWEB`.`VSDirectorio` (`EMP_ID`, `TipoDocumento`, `Descripcion`, `Ruta`, `Estado`) VALUES ('1', '01', 'FACTURA', '/opt/SEADOC/FACTURAS/', '1');
INSERT INTO `APPWEB`.`VSDirectorio` (`EMP_ID`, `TipoDocumento`, `Descripcion`, `Ruta`, `Estado`) VALUES ('1', '04', 'NOTA_DE_CREDITO', '/opt/SEADOC/NC/', '1');
INSERT INTO `APPWEB`.`VSDirectorio` (`EMP_ID`, `TipoDocumento`, `Descripcion`, `Ruta`, `Estado`) VALUES ('1', '05', 'NOTA_DE_DEBITO', '/opt/SEADOC/ND/', '1');
INSERT INTO `APPWEB`.`VSDirectorio` (`EMP_ID`, `TipoDocumento`, `Descripcion`, `Ruta`, `Estado`) VALUES ('1', '06', 'GUÍA_DE_REMISION', '/opt/SEADOC/GUIAS/', '1');
INSERT INTO `APPWEB`.`VSDirectorio` (`EMP_ID`, `TipoDocumento`, `Descripcion`, `Ruta`, `Estado`) VALUES ('1', '07', 'COMPROBANTE_DE_RETENCION', '/opt/SEADOC/RETENCIONES/', '1');

INSERT INTO `APPWEB`.`VSFirmaDigital` (`EMP_ID`, `Clave`, `RutaFile`, `FechaCaducidad`, `Estado`, `UsuarioCreacion`) VALUES ('1', 'VXQxRjRjVHU4NDJvbzE1', 'Y2FybG9zX2VucmlxdWVfY2FzdHJvX2VzcGFuYS5wMTI=', '2017-11-05', '1', '1');

INSERT INTO `APPWEB`.`VSServidorCorreo` (`EMP_ID`, `Mail`, `NombreMostrar`, `Asunto`, `Cuerpo`, `EsHtml`, `Clave`, `Usuario`, `SMTPServidor`, `SMTPPuerto`, `TiempoRespuesta`, `TiempoEspera`, `ActivarAcuse`, `CCO`, `UsuarioCreacion`, `Estado`) VALUES ('1', 'no-responder@utimpor.com', 'UTIMPOR S.A.', 'Ha recibido un(a) {documento} nuevo(a)', '<p><span><strong><span><span style=\"font-size: 12pt;\"><img src=\"http://utimpor.com/FacturaElectronica/Logo/LOGO_UTIMPOR.png\" alt=\"\" />&nbsp;</span></span></strong></span></p><p><span><strong><span><span style=\"font-size: 12pt;\">Estimado(a) {NomCliente},</span></span><br /></strong></span><br />      <span><span style=\"font-size: 12pt;\">Adjunto su comprobante electrÃ³nico </span></span><span><span style=\"font-size: 12pt;\"><strong><span><span style=\"font-size: 12pt;\">{TipoDocumento}</span></span></strong> NÃºmero <strong></strong></span></span><span><span style=\"font-size: 12pt;\"><span><span style=\"font-size: 12pt;\"><strong>{#Doc}</strong> , por los servicios financieros brindados. Si desea su formato RIDE puede descargarlo en el portal del </span></span></span></span><span><span style=\"font-size: 12pt;\"><span><span style=\"font-size: 12pt;\"><span><span style=\"font-size: 12pt;\"><span><span style=\"font-size: 12pt;\"><a href=\"http://utimpor.com/\" target=\"_blank\">Utimpor</a>&nbsp;. Gracias por preferirnos.</span></span></span></span></span></span></span></span></p><p><span><span style=\"font-size: 12pt;\"><span><span style=\"font-size: 12pt;\"><span><span style=\"font-size: 12pt;\"><span><span style=\"font-size: 12pt;\">Â¡Gracias por preferirnos! <br /></span></span></span></span></span></span></span></span></p><p><br /><br /></p><div align=\"center\"><br /></div>', '1', '1234', 'no-responder@utimpor.com', 'mail.utimpor.com', '25', '7', '4', '0', 'byron_villacresef@hotmail.com', '1', '1');


###### FORMAS DE PAGO  #############
INSERT INTO `VSSEAINTERMEDIA`.`VSFormaPago` (`FormaPago`, `Codigo`, `Estado`) VALUES ('SIN UTILIZACION DEL SISTEMA FINANCIERO', '1', '1');
INSERT INTO `VSSEAINTERMEDIA`.`VSFormaPago` (`FormaPago`, `Codigo`, `Estado`) VALUES ('CHEQUE PROPIO', '2', '1');
INSERT INTO `VSSEAINTERMEDIA`.`VSFormaPago` (`FormaPago`, `Codigo`, `Estado`) VALUES ('CHEQUE CERTIFICADO', '3', '1');
INSERT INTO `VSSEAINTERMEDIA`.`VSFormaPago` (`FormaPago`, `Codigo`, `Estado`) VALUES ('CHEQUE DE GERENCIA', '4', '1');
INSERT INTO `VSSEAINTERMEDIA`.`VSFormaPago` (`FormaPago`, `Codigo`, `Estado`) VALUES ('CHEQUE DEL EXTERIOR', '5', '1');
INSERT INTO `VSSEAINTERMEDIA`.`VSFormaPago` (`FormaPago`, `Codigo`, `Estado`) VALUES ('DÉBITO DE CUENTA', '6', '1');
INSERT INTO `VSSEAINTERMEDIA`.`VSFormaPago` (`FormaPago`, `Codigo`, `Estado`) VALUES ('TRANSFERENCIA PROPIO BANCO', '7', '1');
INSERT INTO `VSSEAINTERMEDIA`.`VSFormaPago` (`FormaPago`, `Codigo`, `Estado`) VALUES ('TRANSFERENCIA OTRO BANCO NACIONAL', '8', '1');
INSERT INTO `VSSEAINTERMEDIA`.`VSFormaPago` (`FormaPago`, `Codigo`, `Estado`) VALUES ('TRANSFERENCIA BANCO EXTERIOR', '9', '1');
INSERT INTO `VSSEAINTERMEDIA`.`VSFormaPago` (`FormaPago`, `Codigo`, `Estado`) VALUES ('TARJETA DE CRÉDITO NACIONAL', '10', '1');
INSERT INTO `VSSEAINTERMEDIA`.`VSFormaPago` (`FormaPago`, `Codigo`, `Estado`) VALUES ('TARJETA DE CRÉDITO INTERNACIONAL', '11', '1');
INSERT INTO `VSSEAINTERMEDIA`.`VSFormaPago` (`FormaPago`, `Codigo`, `Estado`) VALUES ('GIRO', '12', '1');
INSERT INTO `VSSEAINTERMEDIA`.`VSFormaPago` (`FormaPago`, `Codigo`, `Estado`) VALUES ('DEPOSITO EN CUENTA (CORRIENTE/AHORROS)', '13', '1');
INSERT INTO `VSSEAINTERMEDIA`.`VSFormaPago` (`FormaPago`, `Codigo`, `Estado`) VALUES ('ENDOSO DE INVERSIÒN', '14', '1');
INSERT INTO `VSSEAINTERMEDIA`.`VSFormaPago` (`FormaPago`, `Codigo`, `Estado`) VALUES ('COMPENSACIÓN DE DEUDAS', '15', '1');
INSERT INTO `VSSEAINTERMEDIA`.`VSFormaPago` (`FormaPago`, `Codigo`, `Estado`) VALUES ('TARJETA DE DÉBITO', '16', '1');
INSERT INTO `VSSEAINTERMEDIA`.`VSFormaPago` (`FormaPago`, `Codigo`, `Estado`) VALUES ('DINERO ELECTRÓNICO', '17', '1');
INSERT INTO `VSSEAINTERMEDIA`.`VSFormaPago` (`FormaPago`, `Codigo`, `Estado`) VALUES ('TARJETA PREPAGO', '18', '1');
INSERT INTO `VSSEAINTERMEDIA`.`VSFormaPago` (`FormaPago`, `Codigo`, `Estado`) VALUES ('TARJETA DE CRÉDITO', '19', '1');
INSERT INTO `VSSEAINTERMEDIA`.`VSFormaPago` (`FormaPago`, `Codigo`, `Estado`) VALUES ('OTROS CON UTILIZACION DEL SISTEMA FINANCIERO', '20', '1');
INSERT INTO `VSSEAINTERMEDIA`.`VSFormaPago` (`FormaPago`, `Codigo`, `Estado`) VALUES ('ENDOSO DE TÍTULOS', '21', '1');
