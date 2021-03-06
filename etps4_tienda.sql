USE [master]
GO
/****** Object:  Database [etps4_tienda]    Script Date: 21/09/2013 11:41:20 ******/
CREATE DATABASE [etps4_tienda]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'etps4_tienda', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL11.MSSQLSERVER\MSSQL\DATA\etps4_tienda.mdf' , SIZE = 5120KB , MAXSIZE = UNLIMITED, FILEGROWTH = 1024KB )
 LOG ON 
( NAME = N'etps4_tienda_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL11.MSSQLSERVER\MSSQL\DATA\etps4_tienda_log.ldf' , SIZE = 1024KB , MAXSIZE = 2048GB , FILEGROWTH = 10%)
GO
ALTER DATABASE [etps4_tienda] SET COMPATIBILITY_LEVEL = 110
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [etps4_tienda].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [etps4_tienda] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [etps4_tienda] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [etps4_tienda] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [etps4_tienda] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [etps4_tienda] SET ARITHABORT OFF 
GO
ALTER DATABASE [etps4_tienda] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [etps4_tienda] SET AUTO_CREATE_STATISTICS ON 
GO
ALTER DATABASE [etps4_tienda] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [etps4_tienda] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [etps4_tienda] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [etps4_tienda] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [etps4_tienda] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [etps4_tienda] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [etps4_tienda] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [etps4_tienda] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [etps4_tienda] SET  DISABLE_BROKER 
GO
ALTER DATABASE [etps4_tienda] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [etps4_tienda] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [etps4_tienda] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [etps4_tienda] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [etps4_tienda] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [etps4_tienda] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [etps4_tienda] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [etps4_tienda] SET RECOVERY FULL 
GO
ALTER DATABASE [etps4_tienda] SET  MULTI_USER 
GO
ALTER DATABASE [etps4_tienda] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [etps4_tienda] SET DB_CHAINING OFF 
GO
ALTER DATABASE [etps4_tienda] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [etps4_tienda] SET TARGET_RECOVERY_TIME = 0 SECONDS 
GO
EXEC sys.sp_db_vardecimal_storage_format N'etps4_tienda', N'ON'
GO
USE [etps4_tienda]
GO
/****** Object:  Table [dbo].[CartItems]    Script Date: 21/09/2013 11:41:20 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[CartItems](
	[ItemId] [nvarchar](128) NOT NULL,
	[CartId] [nvarchar](max) NULL,
	[Quantity] [int] NOT NULL,
	[DateCreated] [datetime] NOT NULL,
	[ProductId] [int] NOT NULL,
 CONSTRAINT [PK_dbo.CartItems] PRIMARY KEY CLUSTERED 
(
	[ItemId] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
/****** Object:  Table [dbo].[Categories]    Script Date: 21/09/2013 11:41:20 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Categories](
	[CategoryID] [int] IDENTITY(1,1) NOT NULL,
	[CategoryName] [nvarchar](100) NOT NULL,
	[Description] [nvarchar](max) NULL,
 CONSTRAINT [PK_dbo.Categories] PRIMARY KEY CLUSTERED 
(
	[CategoryID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
/****** Object:  Table [dbo].[OrderDetails]    Script Date: 21/09/2013 11:41:20 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[OrderDetails](
	[OrderDetailId] [int] IDENTITY(1,1) NOT NULL,
	[OrderId] [int] NOT NULL,
	[Username] [nvarchar](max) NULL,
	[ProductId] [int] NOT NULL,
	[Quantity] [int] NOT NULL,
	[UnitPrice] [float] NULL,
 CONSTRAINT [PK_dbo.OrderDetails] PRIMARY KEY CLUSTERED 
(
	[OrderDetailId] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
/****** Object:  Table [dbo].[Orders]    Script Date: 21/09/2013 11:41:20 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Orders](
	[OrderId] [int] IDENTITY(1,1) NOT NULL,
	[OrderDate] [datetime] NOT NULL,
	[Username] [nvarchar](max) NULL,
	[FirstName] [nvarchar](160) NOT NULL,
	[LastName] [nvarchar](160) NOT NULL,
	[Address] [nvarchar](70) NOT NULL,
	[City] [nvarchar](40) NOT NULL,
	[State] [nvarchar](40) NOT NULL,
	[PostalCode] [nvarchar](10) NOT NULL,
	[Country] [nvarchar](40) NOT NULL,
	[Phone] [nvarchar](24) NULL,
	[Email] [nvarchar](max) NOT NULL,
	[Total] [decimal](18, 2) NOT NULL,
	[PaymentTransactionId] [nvarchar](max) NULL,
	[HasBeenShipped] [bit] NOT NULL,
 CONSTRAINT [PK_dbo.Orders] PRIMARY KEY CLUSTERED 
(
	[OrderId] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
/****** Object:  Table [dbo].[Products]    Script Date: 21/09/2013 11:41:20 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Products](
	[ProductID] [int] IDENTITY(1,1) NOT NULL,
	[ProductName] [nvarchar](100) NOT NULL,
	[Description] [nvarchar](max) NOT NULL,
	[ImagePath] [nvarchar](max) NULL,
	[UnitPrice] [float] NULL,
	[CategoryID] [int] NULL,
 CONSTRAINT [PK_dbo.Products] PRIMARY KEY CLUSTERED 
(
	[ProductID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
INSERT [dbo].[CartItems] ([ItemId], [CartId], [Quantity], [DateCreated], [ProductId]) VALUES (N'13a1005c-259b-49df-bab8-a3c09708169e', N'331788d1-6ab7-4c35-a571-03074a2def61', 1, CAST(0x0000A21F00F77C97 AS DateTime), 1)
INSERT [dbo].[CartItems] ([ItemId], [CartId], [Quantity], [DateCreated], [ProductId]) VALUES (N'15a27d07-9297-4489-9eb1-690b7533c646', N'9c2560d5-799f-4919-8b4a-3bad2774f931', 39, CAST(0x0000A22201434307 AS DateTime), 5)
INSERT [dbo].[CartItems] ([ItemId], [CartId], [Quantity], [DateCreated], [ProductId]) VALUES (N'24675dc1-c800-4eb7-a3cc-384cf10e150e', N'9c2560d5-799f-4919-8b4a-3bad2774f931', 1, CAST(0x0000A2220145DBD8 AS DateTime), 3)
INSERT [dbo].[CartItems] ([ItemId], [CartId], [Quantity], [DateCreated], [ProductId]) VALUES (N'2a3c65b3-ff1a-4e0e-8f69-137d92e03e14', N'7f0d2535-6e52-4d09-8882-220f8296101b', 1, CAST(0x0000A22000F4A48D AS DateTime), 4)
INSERT [dbo].[CartItems] ([ItemId], [CartId], [Quantity], [DateCreated], [ProductId]) VALUES (N'4be182b9-6a67-4930-bf98-8175ed187846', N'0a2f927c-2078-4054-9746-9626cf94657f', 1, CAST(0x0000A22000ED7F93 AS DateTime), 2)
INSERT [dbo].[CartItems] ([ItemId], [CartId], [Quantity], [DateCreated], [ProductId]) VALUES (N'4de3fe17-f345-4683-8467-86b46fac67ff', N'7f0d2535-6e52-4d09-8882-220f8296101b', 1, CAST(0x0000A22000F4B367 AS DateTime), 2)
INSERT [dbo].[CartItems] ([ItemId], [CartId], [Quantity], [DateCreated], [ProductId]) VALUES (N'4e722d6b-d489-4524-beaf-3cc50c5661e9', N'331788d1-6ab7-4c35-a571-03074a2def61', 1, CAST(0x0000A21F00F78BF5 AS DateTime), 4)
INSERT [dbo].[CartItems] ([ItemId], [CartId], [Quantity], [DateCreated], [ProductId]) VALUES (N'5c85377d-ae9e-4819-acaa-7af7284b423b', N'fb87115a-bd64-4546-827a-a66b47ffe915', 1, CAST(0x0000A22400FD8E56 AS DateTime), 2)
INSERT [dbo].[CartItems] ([ItemId], [CartId], [Quantity], [DateCreated], [ProductId]) VALUES (N'935ec59d-3b84-4c25-a0f1-ffc79bb0fdf2', N'dc998624-269c-49c9-aa5f-b3565b152313', 1, CAST(0x0000A222011EC008 AS DateTime), 3)
INSERT [dbo].[CartItems] ([ItemId], [CartId], [Quantity], [DateCreated], [ProductId]) VALUES (N'9cc78c77-e961-4cb7-bcd2-23fe195802e2', N'331788d1-6ab7-4c35-a571-03074a2def61', 1, CAST(0x0000A21F00F78659 AS DateTime), 3)
INSERT [dbo].[CartItems] ([ItemId], [CartId], [Quantity], [DateCreated], [ProductId]) VALUES (N'9dc63138-bdb9-45cc-80a7-8b4f35575ce1', N'fb87115a-bd64-4546-827a-a66b47ffe915', 1, CAST(0x0000A22400FDA1F1 AS DateTime), 3)
INSERT [dbo].[CartItems] ([ItemId], [CartId], [Quantity], [DateCreated], [ProductId]) VALUES (N'a3881f7b-cb98-4370-be3a-365af13783ca', N'roberto.mendoza', 1, CAST(0x0000A2220123687B AS DateTime), 1)
INSERT [dbo].[CartItems] ([ItemId], [CartId], [Quantity], [DateCreated], [ProductId]) VALUES (N'ad34240f-bb43-4e3a-9704-db00b6acbea7', N'fe0a4b55-b2f2-4736-94a0-8212168093f0', 1, CAST(0x0000A21F0105ADA6 AS DateTime), 2)
INSERT [dbo].[CartItems] ([ItemId], [CartId], [Quantity], [DateCreated], [ProductId]) VALUES (N'b4301b25-54ac-401c-bdda-62d4fb2d28cf', N'd8b9522f-60eb-4362-a430-1797e222f10b', 1, CAST(0x0000A22100A1A9B9 AS DateTime), 1)
INSERT [dbo].[CartItems] ([ItemId], [CartId], [Quantity], [DateCreated], [ProductId]) VALUES (N'b9bef080-1df2-4c1d-be57-d59359b1ed36', N'1224f808-7b56-4482-8139-dcdcb8d8151b', 1, CAST(0x0000A22401096166 AS DateTime), 2)
INSERT [dbo].[CartItems] ([ItemId], [CartId], [Quantity], [DateCreated], [ProductId]) VALUES (N'd2e41cc6-f6e2-466b-9576-b5ec043486d0', N'29d5b1c2-b855-477f-b71e-536f9fc25dce', 1, CAST(0x0000A220016D53E0 AS DateTime), 1)
INSERT [dbo].[CartItems] ([ItemId], [CartId], [Quantity], [DateCreated], [ProductId]) VALUES (N'de89e20d-bfcb-4ada-873c-5b0aa9b8a9d9', N'fb87115a-bd64-4546-827a-a66b47ffe915', 1, CAST(0x0000A22400FD7E66 AS DateTime), 1)
INSERT [dbo].[CartItems] ([ItemId], [CartId], [Quantity], [DateCreated], [ProductId]) VALUES (N'e701d791-8568-4927-b035-76603152246f', N'da6db9f8-3e37-478a-8c95-2bf9325d0ee0', 1, CAST(0x0000A22000EC853F AS DateTime), 2)
INSERT [dbo].[CartItems] ([ItemId], [CartId], [Quantity], [DateCreated], [ProductId]) VALUES (N'e9882df6-3737-494d-89e1-13d1c4096a4d', N'carlos.rivera', 1, CAST(0x0000A222011F9B79 AS DateTime), 1)
SET IDENTITY_INSERT [dbo].[Categories] ON 

INSERT [dbo].[Categories] ([CategoryID], [CategoryName], [Description]) VALUES (1, N'Artículos de cocina', NULL)
INSERT [dbo].[Categories] ([CategoryID], [CategoryName], [Description]) VALUES (2, N'Tecnología', NULL)
INSERT [dbo].[Categories] ([CategoryID], [CategoryName], [Description]) VALUES (3, N'Artículos de oficina', NULL)
INSERT [dbo].[Categories] ([CategoryID], [CategoryName], [Description]) VALUES (4, N'Hogar', NULL)
INSERT [dbo].[Categories] ([CategoryID], [CategoryName], [Description]) VALUES (5, N'Otros', NULL)
SET IDENTITY_INSERT [dbo].[Categories] OFF
SET IDENTITY_INSERT [dbo].[OrderDetails] ON 

INSERT [dbo].[OrderDetails] ([OrderDetailId], [OrderId], [Username], [ProductId], [Quantity], [UnitPrice]) VALUES (1, 1, N'vrbh85@gmail.com', 1, 1, 22.5)
INSERT [dbo].[OrderDetails] ([OrderDetailId], [OrderId], [Username], [ProductId], [Quantity], [UnitPrice]) VALUES (2, 1, N'vrbh85@gmail.com', 3, 1, 100)
INSERT [dbo].[OrderDetails] ([OrderDetailId], [OrderId], [Username], [ProductId], [Quantity], [UnitPrice]) VALUES (3, 2, N'vrbh85@gmail.com', 4, 1, 95)
INSERT [dbo].[OrderDetails] ([OrderDetailId], [OrderId], [Username], [ProductId], [Quantity], [UnitPrice]) VALUES (4, 2, N'vrbh85@gmail.com', 2, 1, 95)
INSERT [dbo].[OrderDetails] ([OrderDetailId], [OrderId], [Username], [ProductId], [Quantity], [UnitPrice]) VALUES (5, 3, N'vrbh85@gmail.com', 1, 1, 22.5)
INSERT [dbo].[OrderDetails] ([OrderDetailId], [OrderId], [Username], [ProductId], [Quantity], [UnitPrice]) VALUES (6, 3, N'vrbh85@gmail.com', 3, 1, 100)
INSERT [dbo].[OrderDetails] ([OrderDetailId], [OrderId], [Username], [ProductId], [Quantity], [UnitPrice]) VALUES (7, 4, N'vrbh85@gmail.com', 3, 1, 100)
INSERT [dbo].[OrderDetails] ([OrderDetailId], [OrderId], [Username], [ProductId], [Quantity], [UnitPrice]) VALUES (8, 4, N'vrbh85@gmail.com', 4, 1, 95)
INSERT [dbo].[OrderDetails] ([OrderDetailId], [OrderId], [Username], [ProductId], [Quantity], [UnitPrice]) VALUES (9, 5, N'vrbh85@gmail.com', 3, 1, 100)
INSERT [dbo].[OrderDetails] ([OrderDetailId], [OrderId], [Username], [ProductId], [Quantity], [UnitPrice]) VALUES (10, 6, N'vrbh85@gmail.com', 1, 1, 22.5)
INSERT [dbo].[OrderDetails] ([OrderDetailId], [OrderId], [Username], [ProductId], [Quantity], [UnitPrice]) VALUES (11, 6, N'vrbh85@gmail.com', 3, 1, 100)
INSERT [dbo].[OrderDetails] ([OrderDetailId], [OrderId], [Username], [ProductId], [Quantity], [UnitPrice]) VALUES (12, 7, N'abel.ehm@gmail.com', 5, 39, 45.95)
INSERT [dbo].[OrderDetails] ([OrderDetailId], [OrderId], [Username], [ProductId], [Quantity], [UnitPrice]) VALUES (13, 7, N'abel.ehm@gmail.com', 3, 1, 100)
INSERT [dbo].[OrderDetails] ([OrderDetailId], [OrderId], [Username], [ProductId], [Quantity], [UnitPrice]) VALUES (14, 8, N'abel.ehm@gmail.com', 5, 39, 45.95)
INSERT [dbo].[OrderDetails] ([OrderDetailId], [OrderId], [Username], [ProductId], [Quantity], [UnitPrice]) VALUES (15, 8, N'abel.ehm@gmail.com', 3, 1, 100)
INSERT [dbo].[OrderDetails] ([OrderDetailId], [OrderId], [Username], [ProductId], [Quantity], [UnitPrice]) VALUES (16, 9, N'abel.ehm@gmail.com', 2, 1, 95)
INSERT [dbo].[OrderDetails] ([OrderDetailId], [OrderId], [Username], [ProductId], [Quantity], [UnitPrice]) VALUES (17, 10, N'elias.bonillas@gmail.com', 1, 1, 22.5)
SET IDENTITY_INSERT [dbo].[OrderDetails] OFF
SET IDENTITY_INSERT [dbo].[Orders] ON 

INSERT [dbo].[Orders] ([OrderId], [OrderDate], [Username], [FirstName], [LastName], [Address], [City], [State], [PostalCode], [Country], [Phone], [Email], [Total], [PaymentTransactionId], [HasBeenShipped]) VALUES (1, CAST(0x0000A21F01131450 AS DateTime), N'vrbh85@gmail.com', N'Ricardo', N'Barrera', N'1 Main St', N'San Jose', N'CA', N'95131', N'US', NULL, N'etps4_tienda@gmail.com', CAST(122.50 AS Decimal(18, 2)), NULL, 0)
INSERT [dbo].[Orders] ([OrderId], [OrderDate], [Username], [FirstName], [LastName], [Address], [City], [State], [PostalCode], [Country], [Phone], [Email], [Total], [PaymentTransactionId], [HasBeenShipped]) VALUES (2, CAST(0x0000A22000F5A1A4 AS DateTime), N'vrbh85@gmail.com', N'Ricardo', N'Barrera', N'1 Main St', N'San Jose', N'CA', N'95131', N'US', NULL, N'etps4_tienda@gmail.com', CAST(190.00 AS Decimal(18, 2)), NULL, 0)
INSERT [dbo].[Orders] ([OrderId], [OrderDate], [Username], [FirstName], [LastName], [Address], [City], [State], [PostalCode], [Country], [Phone], [Email], [Total], [PaymentTransactionId], [HasBeenShipped]) VALUES (3, CAST(0x0000A22000F72DBC AS DateTime), N'vrbh85@gmail.com', N'Ricardo', N'Barrera', N'1 Main St', N'San Jose', N'CA', N'95131', N'US', NULL, N'etps4_tienda@gmail.com', CAST(122.50 AS Decimal(18, 2)), N'79D41799U8703914L', 0)
INSERT [dbo].[Orders] ([OrderId], [OrderDate], [Username], [FirstName], [LastName], [Address], [City], [State], [PostalCode], [Country], [Phone], [Email], [Total], [PaymentTransactionId], [HasBeenShipped]) VALUES (4, CAST(0x0000A22000F85C14 AS DateTime), N'vrbh85@gmail.com', N'Ricardo', N'Barrera', N'1 Main St', N'San Jose', N'CA', N'95131', N'US', NULL, N'etps4_tienda@gmail.com', CAST(195.00 AS Decimal(18, 2)), N'32L803537T5616523', 0)
INSERT [dbo].[Orders] ([OrderId], [OrderDate], [Username], [FirstName], [LastName], [Address], [City], [State], [PostalCode], [Country], [Phone], [Email], [Total], [PaymentTransactionId], [HasBeenShipped]) VALUES (5, CAST(0x0000A22000F91FC8 AS DateTime), N'vrbh85@gmail.com', N'Ricardo', N'Barrera', N'1 Main St', N'San Jose', N'CA', N'95131', N'US', NULL, N'etps4_tienda@gmail.com', CAST(100.00 AS Decimal(18, 2)), N'4B663520RV768031T', 0)
INSERT [dbo].[Orders] ([OrderId], [OrderDate], [Username], [FirstName], [LastName], [Address], [City], [State], [PostalCode], [Country], [Phone], [Email], [Total], [PaymentTransactionId], [HasBeenShipped]) VALUES (6, CAST(0x0000A220013128B4 AS DateTime), N'vrbh85@gmail.com', N'Ricardo', N'Barrera', N'1 Main St', N'San Jose', N'CA', N'95131', N'US', NULL, N'etps4_tienda@gmail.com', CAST(122.50 AS Decimal(18, 2)), N'4RK83398M8678900H', 0)
INSERT [dbo].[Orders] ([OrderId], [OrderDate], [Username], [FirstName], [LastName], [Address], [City], [State], [PostalCode], [Country], [Phone], [Email], [Total], [PaymentTransactionId], [HasBeenShipped]) VALUES (7, CAST(0x0000A22201479810 AS DateTime), N'abel.ehm@gmail.com', N'Abel', N'Hernandez Mejia', N'no se cual es', N'San Salvador', N'San Salvador', N'503', N'SV', NULL, N'abel.ehm@gmail.com', CAST(1892.05 AS Decimal(18, 2)), NULL, 0)
INSERT [dbo].[Orders] ([OrderId], [OrderDate], [Username], [FirstName], [LastName], [Address], [City], [State], [PostalCode], [Country], [Phone], [Email], [Total], [PaymentTransactionId], [HasBeenShipped]) VALUES (8, CAST(0x0000A22201492FE0 AS DateTime), N'abel.ehm@gmail.com', N'Abel', N'Hernandez Mejia', N'no se cual es', N'San Salvador', N'San Salvador', N'503', N'SV', NULL, N'abel.ehm@gmail.com', CAST(1892.05 AS Decimal(18, 2)), NULL, 0)
INSERT [dbo].[Orders] ([OrderId], [OrderDate], [Username], [FirstName], [LastName], [Address], [City], [State], [PostalCode], [Country], [Phone], [Email], [Total], [PaymentTransactionId], [HasBeenShipped]) VALUES (9, CAST(0x0000A22400F66D8C AS DateTime), N'abel.ehm@gmail.com', N'Ricardo', N'Barrera', N'1 Main St', N'San Jose', N'CA', N'95131', N'US', NULL, N'etps4_tienda@gmail.com', CAST(95.00 AS Decimal(18, 2)), N'5UG97637P3762654A', 0)
INSERT [dbo].[Orders] ([OrderId], [OrderDate], [Username], [FirstName], [LastName], [Address], [City], [State], [PostalCode], [Country], [Phone], [Email], [Total], [PaymentTransactionId], [HasBeenShipped]) VALUES (10, CAST(0x0000A22400FC6CB4 AS DateTime), N'elias.bonillas@gmail.com', N'Abel', N'Hernandez Mejia', N'no se cual es', N'San Salvador', N'San Salvador', N'503', N'SV', NULL, N'abel.ehm@gmail.com', CAST(22.50 AS Decimal(18, 2)), N'57265149P3997015M', 0)
SET IDENTITY_INSERT [dbo].[Orders] OFF
SET IDENTITY_INSERT [dbo].[Products] ON 

INSERT [dbo].[Products] ([ProductID], [ProductName], [Description], [ImagePath], [UnitPrice], [CategoryID]) VALUES (1, N'Cocina', N'Electrica de dos quemadores. MABE!', N'cocina_1.jpg', 22.5, 1)
INSERT [dbo].[Products] ([ProductID], [ProductName], [Description], [ImagePath], [UnitPrice], [CategoryID]) VALUES (2, N'Laptop', N'Compaq Intel Pentium 2gb ram.', N'laptop_1.jpg', 95, 2)
INSERT [dbo].[Products] ([ProductID], [ProductName], [Description], [ImagePath], [UnitPrice], [CategoryID]) VALUES (3, N'Fax', N'Canon.', N'fax_1.jpg', 100, 3)
INSERT [dbo].[Products] ([ProductID], [ProductName], [Description], [ImagePath], [UnitPrice], [CategoryID]) VALUES (4, N'Televisor', N'Toshiba plasma 21 pulgadas Entrada usb!', N'televisor_1.jpg', 95, 4)
INSERT [dbo].[Products] ([ProductID], [ProductName], [Description], [ImagePath], [UnitPrice], [CategoryID]) VALUES (5, N'mp3', N'reproducto 5gb.', N'mp3_1.jpg', 45.95, 5)
SET IDENTITY_INSERT [dbo].[Products] OFF
/****** Object:  Index [IX_ProductId]    Script Date: 21/09/2013 11:41:20 ******/
CREATE NONCLUSTERED INDEX [IX_ProductId] ON [dbo].[CartItems]
(
	[ProductId] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [IX_OrderId]    Script Date: 21/09/2013 11:41:20 ******/
CREATE NONCLUSTERED INDEX [IX_OrderId] ON [dbo].[OrderDetails]
(
	[OrderId] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
/****** Object:  Index [IX_CategoryID]    Script Date: 21/09/2013 11:41:20 ******/
CREATE NONCLUSTERED INDEX [IX_CategoryID] ON [dbo].[Products]
(
	[CategoryID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
ALTER TABLE [dbo].[CartItems]  WITH CHECK ADD  CONSTRAINT [FK_dbo.CartItems_dbo.Products_ProductId] FOREIGN KEY([ProductId])
REFERENCES [dbo].[Products] ([ProductID])
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[CartItems] CHECK CONSTRAINT [FK_dbo.CartItems_dbo.Products_ProductId]
GO
ALTER TABLE [dbo].[OrderDetails]  WITH CHECK ADD  CONSTRAINT [FK_dbo.OrderDetails_dbo.Orders_OrderId] FOREIGN KEY([OrderId])
REFERENCES [dbo].[Orders] ([OrderId])
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[OrderDetails] CHECK CONSTRAINT [FK_dbo.OrderDetails_dbo.Orders_OrderId]
GO
ALTER TABLE [dbo].[Products]  WITH CHECK ADD  CONSTRAINT [FK_dbo.Products_dbo.Categories_CategoryID] FOREIGN KEY([CategoryID])
REFERENCES [dbo].[Categories] ([CategoryID])
GO
ALTER TABLE [dbo].[Products] CHECK CONSTRAINT [FK_dbo.Products_dbo.Categories_CategoryID]
GO
USE [master]
GO
ALTER DATABASE [etps4_tienda] SET  READ_WRITE 
GO
