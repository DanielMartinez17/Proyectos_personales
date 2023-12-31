USE [master]
GO
/****** Object:  Database [ClinicaMyM]    Script Date: 14/11/2022 4:13:14 ******/
CREATE DATABASE [ClinicaMyM]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'ClinicaMyM', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL15.SQLEXPRESS\MSSQL\DATA\ClinicaMyM.mdf' , SIZE = 8192KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON 
( NAME = N'ClinicaMyM_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL15.SQLEXPRESS\MSSQL\DATA\ClinicaMyM_log.ldf' , SIZE = 8192KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
 WITH CATALOG_COLLATION = DATABASE_DEFAULT
GO
ALTER DATABASE [ClinicaMyM] SET COMPATIBILITY_LEVEL = 150
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [ClinicaMyM].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [ClinicaMyM] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [ClinicaMyM] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [ClinicaMyM] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [ClinicaMyM] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [ClinicaMyM] SET ARITHABORT OFF 
GO
ALTER DATABASE [ClinicaMyM] SET AUTO_CLOSE ON 
GO
ALTER DATABASE [ClinicaMyM] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [ClinicaMyM] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [ClinicaMyM] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [ClinicaMyM] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [ClinicaMyM] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [ClinicaMyM] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [ClinicaMyM] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [ClinicaMyM] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [ClinicaMyM] SET  ENABLE_BROKER 
GO
ALTER DATABASE [ClinicaMyM] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [ClinicaMyM] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [ClinicaMyM] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [ClinicaMyM] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [ClinicaMyM] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [ClinicaMyM] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [ClinicaMyM] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [ClinicaMyM] SET RECOVERY SIMPLE 
GO
ALTER DATABASE [ClinicaMyM] SET  MULTI_USER 
GO
ALTER DATABASE [ClinicaMyM] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [ClinicaMyM] SET DB_CHAINING OFF 
GO
ALTER DATABASE [ClinicaMyM] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [ClinicaMyM] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO
ALTER DATABASE [ClinicaMyM] SET DELAYED_DURABILITY = DISABLED 
GO
ALTER DATABASE [ClinicaMyM] SET ACCELERATED_DATABASE_RECOVERY = OFF  
GO
ALTER DATABASE [ClinicaMyM] SET QUERY_STORE = OFF
GO
USE [ClinicaMyM]
GO
/****** Object:  Table [dbo].[Cita]    Script Date: 14/11/2022 4:13:15 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Cita](
	[id_cita] [int] IDENTITY(1,1) NOT NULL,
	[fechaCita] [date] NOT NULL,
	[horaCita] [time](7) NOT NULL,
	[id_Paciente] [int] NOT NULL,
	[id_Empleado] [int] NOT NULL,
 CONSTRAINT [pk_idCita] PRIMARY KEY CLUSTERED 
(
	[id_cita] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Detalle_Cita]    Script Date: 14/11/2022 4:13:15 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Detalle_Cita](
	[id_Detallecita] [int] IDENTITY(1,1) NOT NULL,
	[id_Cita] [int] NULL,
	[id_Servicio] [int] NULL,
 CONSTRAINT [pk_idDetalleCita] PRIMARY KEY CLUSTERED 
(
	[id_Detallecita] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Detalle_Factura]    Script Date: 14/11/2022 4:13:15 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Detalle_Factura](
	[id_detalleFac] [int] IDENTITY(1,1) NOT NULL,
	[cantidad] [int] NOT NULL,
	[id_Factura] [int] NULL,
	[id_Servicio] [int] NULL,
 CONSTRAINT [pk_idDetalleFactura] PRIMARY KEY CLUSTERED 
(
	[id_detalleFac] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Detalle_Servicio]    Script Date: 14/11/2022 4:13:15 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Detalle_Servicio](
	[id_detalleServ] [int] IDENTITY(1,1) NOT NULL,
	[id_Servicio] [int] NULL,
	[id_Producto] [int] NULL,
 CONSTRAINT [pk_idDetalleServ] PRIMARY KEY CLUSTERED 
(
	[id_detalleServ] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Empleado]    Script Date: 14/11/2022 4:13:15 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Empleado](
	[id_empleado] [int] IDENTITY(1,1) NOT NULL,
	[nombreEmp] [varchar](50) NOT NULL,
	[apellidoEmp] [varchar](50) NOT NULL,
	[cargoEmp] [varchar](25) NOT NULL,
	[fechaNacEmp] [date] NOT NULL,
	[fechaContratEmp] [date] NOT NULL,
	[estadoEmp] [varchar](25) NOT NULL,
	[usuario] [varchar](15) NOT NULL,
	[contraseña] [varchar](max) NOT NULL,
 CONSTRAINT [pk_idEmpleado] PRIMARY KEY CLUSTERED 
(
	[id_empleado] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Expediente]    Script Date: 14/11/2022 4:13:15 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Expediente](
	[id_expediente] [int] IDENTITY(1,1) NOT NULL,
	[diagnostico] [varchar](150) NOT NULL,
	[recomendacion] [varchar](300) NOT NULL,
	[receta] [varchar](300) NULL,
	[notaAdici] [varchar](300) NULL,
	[id_Cita] [int] NOT NULL,
	[id_Paciente] [int] NOT NULL,
	[id_Empleado] [int] NOT NULL,
 CONSTRAINT [pk_idExpediente] PRIMARY KEY CLUSTERED 
(
	[id_expediente] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Factura]    Script Date: 14/11/2022 4:13:15 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Factura](
	[id_factura] [int] IDENTITY(1,1) NOT NULL,
	[fechaHoraFact] [datetime] NOT NULL,
	[tipoPago] [varchar](20) NOT NULL,
	[id_Paciente] [int] NOT NULL,
	[id_Empleado] [int] NOT NULL,
 CONSTRAINT [pk_idFactura] PRIMARY KEY CLUSTERED 
(
	[id_factura] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Paciente]    Script Date: 14/11/2022 4:13:15 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Paciente](
	[id_paciente] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](50) NOT NULL,
	[apellido] [varchar](50) NOT NULL,
	[fechaNacPaci] [date] NOT NULL,
	[direccion] [varchar](100) NOT NULL,
 CONSTRAINT [pk_idCliente] PRIMARY KEY CLUSTERED 
(
	[id_paciente] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Producto]    Script Date: 14/11/2022 4:13:15 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Producto](
	[id_producto] [int] IDENTITY(1,1) NOT NULL,
	[nombreProd] [varchar](50) NOT NULL,
	[descripcionProd] [varchar](100) NULL,
	[cantidadProd] [int] NOT NULL,
 CONSTRAINT [pk_idProducto] PRIMARY KEY CLUSTERED 
(
	[id_producto] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Servicio]    Script Date: 14/11/2022 4:13:15 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Servicio](
	[id_servicio] [int] IDENTITY(1,1) NOT NULL,
	[nombreServ] [varchar](50) NOT NULL,
	[descripcionServ] [varchar](100) NOT NULL,
	[precioServ] [money] NOT NULL,
 CONSTRAINT [pk_idServicio] PRIMARY KEY CLUSTERED 
(
	[id_servicio] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
SET IDENTITY_INSERT [dbo].[Cita] ON 

INSERT [dbo].[Cita] ([id_cita], [fechaCita], [horaCita], [id_Paciente], [id_Empleado]) VALUES (1, CAST(N'2022-11-13' AS Date), CAST(N'05:25:16' AS Time), 1, 3)
INSERT [dbo].[Cita] ([id_cita], [fechaCita], [horaCita], [id_Paciente], [id_Empleado]) VALUES (4, CAST(N'2022-11-13' AS Date), CAST(N'19:56:10' AS Time), 1, 1)
INSERT [dbo].[Cita] ([id_cita], [fechaCita], [horaCita], [id_Paciente], [id_Empleado]) VALUES (5, CAST(N'2022-11-14' AS Date), CAST(N'10:43:23' AS Time), 1, 3)
SET IDENTITY_INSERT [dbo].[Cita] OFF
GO
SET IDENTITY_INSERT [dbo].[Detalle_Cita] ON 

INSERT [dbo].[Detalle_Cita] ([id_Detallecita], [id_Cita], [id_Servicio]) VALUES (1, 1, 1)
SET IDENTITY_INSERT [dbo].[Detalle_Cita] OFF
GO
SET IDENTITY_INSERT [dbo].[Detalle_Factura] ON 

INSERT [dbo].[Detalle_Factura] ([id_detalleFac], [cantidad], [id_Factura], [id_Servicio]) VALUES (1, 5, 1, 1)
INSERT [dbo].[Detalle_Factura] ([id_detalleFac], [cantidad], [id_Factura], [id_Servicio]) VALUES (5, 5, 5, 1)
INSERT [dbo].[Detalle_Factura] ([id_detalleFac], [cantidad], [id_Factura], [id_Servicio]) VALUES (6, 4, 5, 1)
INSERT [dbo].[Detalle_Factura] ([id_detalleFac], [cantidad], [id_Factura], [id_Servicio]) VALUES (7, 1, 5, 1)
INSERT [dbo].[Detalle_Factura] ([id_detalleFac], [cantidad], [id_Factura], [id_Servicio]) VALUES (8, 3, 6, 1)
INSERT [dbo].[Detalle_Factura] ([id_detalleFac], [cantidad], [id_Factura], [id_Servicio]) VALUES (10, 3, 7, 1)
INSERT [dbo].[Detalle_Factura] ([id_detalleFac], [cantidad], [id_Factura], [id_Servicio]) VALUES (13, 1, 9, 1)
INSERT [dbo].[Detalle_Factura] ([id_detalleFac], [cantidad], [id_Factura], [id_Servicio]) VALUES (14, 1, 10, 1)
INSERT [dbo].[Detalle_Factura] ([id_detalleFac], [cantidad], [id_Factura], [id_Servicio]) VALUES (15, 2, 11, 1)
INSERT [dbo].[Detalle_Factura] ([id_detalleFac], [cantidad], [id_Factura], [id_Servicio]) VALUES (16, 1, 12, 1)
INSERT [dbo].[Detalle_Factura] ([id_detalleFac], [cantidad], [id_Factura], [id_Servicio]) VALUES (17, 2, 12, 1)
INSERT [dbo].[Detalle_Factura] ([id_detalleFac], [cantidad], [id_Factura], [id_Servicio]) VALUES (18, 1, 13, 1)
INSERT [dbo].[Detalle_Factura] ([id_detalleFac], [cantidad], [id_Factura], [id_Servicio]) VALUES (19, 2, 13, 1)
SET IDENTITY_INSERT [dbo].[Detalle_Factura] OFF
GO
SET IDENTITY_INSERT [dbo].[Detalle_Servicio] ON 

INSERT [dbo].[Detalle_Servicio] ([id_detalleServ], [id_Servicio], [id_Producto]) VALUES (1, 1, 1)
SET IDENTITY_INSERT [dbo].[Detalle_Servicio] OFF
GO
SET IDENTITY_INSERT [dbo].[Empleado] ON 

INSERT [dbo].[Empleado] ([id_empleado], [nombreEmp], [apellidoEmp], [cargoEmp], [fechaNacEmp], [fechaContratEmp], [estadoEmp], [usuario], [contraseña]) VALUES (1, N'Daniel Orlando', N'Martínez Gutiérrez', N'Dueño', CAST(N'2002-07-17' AS Date), CAST(N'2020-02-13' AS Date), N'Activo', N'domg', N'J3BetTRnrsw=')
INSERT [dbo].[Empleado] ([id_empleado], [nombreEmp], [apellidoEmp], [cargoEmp], [fechaNacEmp], [fechaContratEmp], [estadoEmp], [usuario], [contraseña]) VALUES (2, N'Jerson Enrique', N'Mejía Martínez', N'Doctor', CAST(N'1999-02-25' AS Date), CAST(N'2014-06-14' AS Date), N'Activo', N'jemm', N'J3BetTRnrsw=')
INSERT [dbo].[Empleado] ([id_empleado], [nombreEmp], [apellidoEmp], [cargoEmp], [fechaNacEmp], [fechaContratEmp], [estadoEmp], [usuario], [contraseña]) VALUES (3, N'Angelica María', N'Pérez Lemus', N'Secretaria', CAST(N'2000-02-10' AS Date), CAST(N'2017-08-19' AS Date), N'Activo', N'ampl', N'J3BetTRnrsw=')
INSERT [dbo].[Empleado] ([id_empleado], [nombreEmp], [apellidoEmp], [cargoEmp], [fechaNacEmp], [fechaContratEmp], [estadoEmp], [usuario], [contraseña]) VALUES (4, N'Kevin Geovanni', N'Durán Salazar', N'Doctor', CAST(N'2023-10-19' AS Date), CAST(N'2017-08-25' AS Date), N'Inactivo', N'kgds', N'J3BetTRnrsw=')
INSERT [dbo].[Empleado] ([id_empleado], [nombreEmp], [apellidoEmp], [cargoEmp], [fechaNacEmp], [fechaContratEmp], [estadoEmp], [usuario], [contraseña]) VALUES (5, N'prueba', N'prueba 2', N'Doctor', CAST(N'2022-11-02' AS Date), CAST(N'2022-11-03' AS Date), N'Inactivo', N'prueba', N'wIJH5d7zzos=')
SET IDENTITY_INSERT [dbo].[Empleado] OFF
GO
SET IDENTITY_INSERT [dbo].[Expediente] ON 

INSERT [dbo].[Expediente] ([id_expediente], [diagnostico], [recomendacion], [receta], [notaAdici], [id_Cita], [id_Paciente], [id_Empleado]) VALUES (1, N'a', N'a', N'a', N'a', 5, 1, 2)
SET IDENTITY_INSERT [dbo].[Expediente] OFF
GO
SET IDENTITY_INSERT [dbo].[Factura] ON 

INSERT [dbo].[Factura] ([id_factura], [fechaHoraFact], [tipoPago], [id_Paciente], [id_Empleado]) VALUES (1, CAST(N'2022-11-13T16:19:45.000' AS DateTime), N'Efectivo', 1, 3)
INSERT [dbo].[Factura] ([id_factura], [fechaHoraFact], [tipoPago], [id_Paciente], [id_Empleado]) VALUES (2, CAST(N'2022-11-13T16:22:37.000' AS DateTime), N'Cheque', 1, 4)
INSERT [dbo].[Factura] ([id_factura], [fechaHoraFact], [tipoPago], [id_Paciente], [id_Empleado]) VALUES (3, CAST(N'2022-11-13T16:31:05.000' AS DateTime), N'Cheque', 1, 2)
INSERT [dbo].[Factura] ([id_factura], [fechaHoraFact], [tipoPago], [id_Paciente], [id_Empleado]) VALUES (4, CAST(N'2022-11-13T16:34:57.000' AS DateTime), N'Otro', 1, 2)
INSERT [dbo].[Factura] ([id_factura], [fechaHoraFact], [tipoPago], [id_Paciente], [id_Empleado]) VALUES (5, CAST(N'2022-11-13T16:50:41.000' AS DateTime), N'Cheque', 1, 2)
INSERT [dbo].[Factura] ([id_factura], [fechaHoraFact], [tipoPago], [id_Paciente], [id_Empleado]) VALUES (6, CAST(N'2022-11-13T16:58:53.000' AS DateTime), N'Efectivo', 1, 2)
INSERT [dbo].[Factura] ([id_factura], [fechaHoraFact], [tipoPago], [id_Paciente], [id_Empleado]) VALUES (7, CAST(N'2022-11-13T17:03:44.000' AS DateTime), N'Cheque', 1, 3)
INSERT [dbo].[Factura] ([id_factura], [fechaHoraFact], [tipoPago], [id_Paciente], [id_Empleado]) VALUES (8, CAST(N'2022-11-13T17:06:28.000' AS DateTime), N'Efectivo', 1, 3)
INSERT [dbo].[Factura] ([id_factura], [fechaHoraFact], [tipoPago], [id_Paciente], [id_Empleado]) VALUES (9, CAST(N'2022-11-14T01:39:30.000' AS DateTime), N'Efectivo', 1, 1)
INSERT [dbo].[Factura] ([id_factura], [fechaHoraFact], [tipoPago], [id_Paciente], [id_Empleado]) VALUES (10, CAST(N'2022-11-14T01:44:52.000' AS DateTime), N'Cheque', 1, 3)
INSERT [dbo].[Factura] ([id_factura], [fechaHoraFact], [tipoPago], [id_Paciente], [id_Empleado]) VALUES (11, CAST(N'2022-11-14T01:45:35.000' AS DateTime), N'Tarjeta', 1, 2)
INSERT [dbo].[Factura] ([id_factura], [fechaHoraFact], [tipoPago], [id_Paciente], [id_Empleado]) VALUES (12, CAST(N'2022-11-14T01:46:05.000' AS DateTime), N'Cheque', 1, 3)
INSERT [dbo].[Factura] ([id_factura], [fechaHoraFact], [tipoPago], [id_Paciente], [id_Empleado]) VALUES (13, CAST(N'2022-11-14T01:52:01.000' AS DateTime), N'Otro', 1, 4)
SET IDENTITY_INSERT [dbo].[Factura] OFF
GO
SET IDENTITY_INSERT [dbo].[Paciente] ON 

INSERT [dbo].[Paciente] ([id_paciente], [nombre], [apellido], [fechaNacPaci], [direccion]) VALUES (1, N'Gerson Vladimir', N'Martínez Gutiérrez', CAST(N'2006-04-11' AS Date), N'Santa Ana')
SET IDENTITY_INSERT [dbo].[Paciente] OFF
GO
SET IDENTITY_INSERT [dbo].[Producto] ON 

INSERT [dbo].[Producto] ([id_producto], [nombreProd], [descripcionProd], [cantidadProd]) VALUES (1, N'Alcohol', N'Para limpiar bacterias', 25)
INSERT [dbo].[Producto] ([id_producto], [nombreProd], [descripcionProd], [cantidadProd]) VALUES (2, N'Algodón', N'Para curaciones', 50)
INSERT [dbo].[Producto] ([id_producto], [nombreProd], [descripcionProd], [cantidadProd]) VALUES (3, N'Jeringas', N'Para inyecciones', 100)
INSERT [dbo].[Producto] ([id_producto], [nombreProd], [descripcionProd], [cantidadProd]) VALUES (4, N'Suero', N'Para hospitalizaciones y solicitudes personales', 25)
SET IDENTITY_INSERT [dbo].[Producto] OFF
GO
SET IDENTITY_INSERT [dbo].[Servicio] ON 

INSERT [dbo].[Servicio] ([id_servicio], [nombreServ], [descripcionServ], [precioServ]) VALUES (1, N'Puesta de vacuna', N'Puede adquirir el medicamento otraerlo de su casa', 3.0000)
SET IDENTITY_INSERT [dbo].[Servicio] OFF
GO
ALTER TABLE [dbo].[Cita]  WITH CHECK ADD  CONSTRAINT [fk_empleadoCita] FOREIGN KEY([id_Empleado])
REFERENCES [dbo].[Empleado] ([id_empleado])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[Cita] CHECK CONSTRAINT [fk_empleadoCita]
GO
ALTER TABLE [dbo].[Cita]  WITH CHECK ADD  CONSTRAINT [fk_pacienteCita] FOREIGN KEY([id_Paciente])
REFERENCES [dbo].[Paciente] ([id_paciente])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[Cita] CHECK CONSTRAINT [fk_pacienteCita]
GO
ALTER TABLE [dbo].[Detalle_Cita]  WITH CHECK ADD  CONSTRAINT [fk_citaDetalleCita] FOREIGN KEY([id_Cita])
REFERENCES [dbo].[Cita] ([id_cita])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[Detalle_Cita] CHECK CONSTRAINT [fk_citaDetalleCita]
GO
ALTER TABLE [dbo].[Detalle_Cita]  WITH CHECK ADD  CONSTRAINT [fk_servicioDetalleCita] FOREIGN KEY([id_Servicio])
REFERENCES [dbo].[Servicio] ([id_servicio])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[Detalle_Cita] CHECK CONSTRAINT [fk_servicioDetalleCita]
GO
ALTER TABLE [dbo].[Detalle_Factura]  WITH CHECK ADD  CONSTRAINT [fk_facturaDetalleFactura] FOREIGN KEY([id_Factura])
REFERENCES [dbo].[Factura] ([id_factura])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[Detalle_Factura] CHECK CONSTRAINT [fk_facturaDetalleFactura]
GO
ALTER TABLE [dbo].[Detalle_Factura]  WITH CHECK ADD  CONSTRAINT [fk_servicioDetalleFactura] FOREIGN KEY([id_Servicio])
REFERENCES [dbo].[Servicio] ([id_servicio])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[Detalle_Factura] CHECK CONSTRAINT [fk_servicioDetalleFactura]
GO
ALTER TABLE [dbo].[Detalle_Servicio]  WITH CHECK ADD  CONSTRAINT [fk_productoDetalleServ] FOREIGN KEY([id_Producto])
REFERENCES [dbo].[Producto] ([id_producto])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[Detalle_Servicio] CHECK CONSTRAINT [fk_productoDetalleServ]
GO
ALTER TABLE [dbo].[Detalle_Servicio]  WITH CHECK ADD  CONSTRAINT [fk_servicioDetalleServ] FOREIGN KEY([id_Servicio])
REFERENCES [dbo].[Servicio] ([id_servicio])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[Detalle_Servicio] CHECK CONSTRAINT [fk_servicioDetalleServ]
GO
ALTER TABLE [dbo].[Expediente]  WITH CHECK ADD  CONSTRAINT [fk_citaExpediente] FOREIGN KEY([id_Cita])
REFERENCES [dbo].[Cita] ([id_cita])
GO
ALTER TABLE [dbo].[Expediente] CHECK CONSTRAINT [fk_citaExpediente]
GO
ALTER TABLE [dbo].[Expediente]  WITH CHECK ADD  CONSTRAINT [fk_empleadoExpediente] FOREIGN KEY([id_Empleado])
REFERENCES [dbo].[Empleado] ([id_empleado])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[Expediente] CHECK CONSTRAINT [fk_empleadoExpediente]
GO
ALTER TABLE [dbo].[Expediente]  WITH CHECK ADD  CONSTRAINT [fk_pacienteExpediente] FOREIGN KEY([id_Paciente])
REFERENCES [dbo].[Paciente] ([id_paciente])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[Expediente] CHECK CONSTRAINT [fk_pacienteExpediente]
GO
ALTER TABLE [dbo].[Factura]  WITH CHECK ADD  CONSTRAINT [fk_empleadoFactura] FOREIGN KEY([id_Empleado])
REFERENCES [dbo].[Empleado] ([id_empleado])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[Factura] CHECK CONSTRAINT [fk_empleadoFactura]
GO
ALTER TABLE [dbo].[Factura]  WITH CHECK ADD  CONSTRAINT [fk_pacienteFactura] FOREIGN KEY([id_Paciente])
REFERENCES [dbo].[Paciente] ([id_paciente])
ON UPDATE CASCADE
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[Factura] CHECK CONSTRAINT [fk_pacienteFactura]
GO
USE [master]
GO
ALTER DATABASE [ClinicaMyM] SET  READ_WRITE 
GO
