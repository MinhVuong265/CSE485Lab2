USE [master]
GO
/****** Object:  Database [TluNews]    Script Date: 12/4/2024 2:40:01 PM ******/
CREATE DATABASE [TluNews]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'TluNews', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL12.MSSQLSERVER\MSSQL\DATA\TluNews.mdf' , SIZE = 3264KB , MAXSIZE = UNLIMITED, FILEGROWTH = 1024KB )
 LOG ON 
( NAME = N'TluNews_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL12.MSSQLSERVER\MSSQL\DATA\TluNews_log.ldf' , SIZE = 560KB , MAXSIZE = 2048GB , FILEGROWTH = 10%)
GO
ALTER DATABASE [TluNews] SET COMPATIBILITY_LEVEL = 120
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [TluNews].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [TluNews] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [TluNews] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [TluNews] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [TluNews] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [TluNews] SET ARITHABORT OFF 
GO
ALTER DATABASE [TluNews] SET AUTO_CLOSE ON 
GO
ALTER DATABASE [TluNews] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [TluNews] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [TluNews] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [TluNews] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [TluNews] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [TluNews] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [TluNews] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [TluNews] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [TluNews] SET  ENABLE_BROKER 
GO
ALTER DATABASE [TluNews] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [TluNews] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [TluNews] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [TluNews] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [TluNews] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [TluNews] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [TluNews] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [TluNews] SET RECOVERY SIMPLE 
GO
ALTER DATABASE [TluNews] SET  MULTI_USER 
GO
ALTER DATABASE [TluNews] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [TluNews] SET DB_CHAINING OFF 
GO
ALTER DATABASE [TluNews] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [TluNews] SET TARGET_RECOVERY_TIME = 0 SECONDS 
GO
ALTER DATABASE [TluNews] SET DELAYED_DURABILITY = DISABLED 
GO
USE [TluNews]
GO
/****** Object:  Table [dbo].[categories]    Script Date: 12/4/2024 2:40:01 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[categories](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[name] [varchar](255) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[news]    Script Date: 12/4/2024 2:40:01 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[news](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[title] [varchar](255) NULL,
	[context] [text] NULL,
	[image] [varchar](255) NULL,
	[create_at] [datetime] NULL,
	[category_id] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[users]    Script Date: 12/4/2024 2:40:01 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[users](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[username] [varchar](255) NULL,
	[password] [varchar](255) NULL,
	[role] [int] NULL DEFAULT ((0)),
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
SET IDENTITY_INSERT [dbo].[categories] ON 

INSERT [dbo].[categories] ([id], [name]) VALUES (1, N'Kinh t?')
INSERT [dbo].[categories] ([id], [name]) VALUES (2, N'Chính tr?')
INSERT [dbo].[categories] ([id], [name]) VALUES (3, N'Quân s?')
INSERT [dbo].[categories] ([id], [name]) VALUES (4, N'Van hóa')
INSERT [dbo].[categories] ([id], [name]) VALUES (5, N'Gi?i trí')
INSERT [dbo].[categories] ([id], [name]) VALUES (6, N'Ð?i s?ng')
SET IDENTITY_INSERT [dbo].[categories] OFF
SET IDENTITY_INSERT [dbo].[news] ON 

INSERT [dbo].[news] ([id], [title], [context], [image], [create_at], [category_id]) VALUES (1, N'title1', N'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', N'', CAST(N'2024-12-04 14:37:42.370' AS DateTime), 1)
INSERT [dbo].[news] ([id], [title], [context], [image], [create_at], [category_id]) VALUES (2, N'title2', N'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', N'', CAST(N'2024-12-04 14:37:42.370' AS DateTime), 2)
INSERT [dbo].[news] ([id], [title], [context], [image], [create_at], [category_id]) VALUES (3, N'title3', N'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', N'', CAST(N'2024-12-04 14:37:42.370' AS DateTime), 3)
INSERT [dbo].[news] ([id], [title], [context], [image], [create_at], [category_id]) VALUES (4, N'title4', N'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', N'', CAST(N'2024-12-04 14:37:42.370' AS DateTime), 4)
INSERT [dbo].[news] ([id], [title], [context], [image], [create_at], [category_id]) VALUES (5, N'title5', N'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', N'', CAST(N'2024-12-04 14:37:42.370' AS DateTime), 5)
INSERT [dbo].[news] ([id], [title], [context], [image], [create_at], [category_id]) VALUES (6, N'title6', N'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', N'', CAST(N'2024-12-04 14:37:42.370' AS DateTime), 2)
INSERT [dbo].[news] ([id], [title], [context], [image], [create_at], [category_id]) VALUES (7, N'title7', N'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', N'', CAST(N'2024-12-04 14:37:42.370' AS DateTime), 1)
SET IDENTITY_INSERT [dbo].[news] OFF
SET IDENTITY_INSERT [dbo].[users] ON 

INSERT [dbo].[users] ([id], [username], [password], [role]) VALUES (1, N'Shalna', N'123', 1)
INSERT [dbo].[users] ([id], [username], [password], [role]) VALUES (2, N'Vernor', N'123', 0)
INSERT [dbo].[users] ([id], [username], [password], [role]) VALUES (3, N'Virgilio', N'123', 0)
INSERT [dbo].[users] ([id], [username], [password], [role]) VALUES (4, N'Quentin', N'123', 0)
INSERT [dbo].[users] ([id], [username], [password], [role]) VALUES (5, N'Carolynn', N'123', 0)
INSERT [dbo].[users] ([id], [username], [password], [role]) VALUES (6, N'Westley', N'123', 0)
INSERT [dbo].[users] ([id], [username], [password], [role]) VALUES (7, N'Cleveland', N'123', 0)
INSERT [dbo].[users] ([id], [username], [password], [role]) VALUES (8, N'Ursuline', N'123', 0)
INSERT [dbo].[users] ([id], [username], [password], [role]) VALUES (9, N'Reuben', N'123', 0)
INSERT [dbo].[users] ([id], [username], [password], [role]) VALUES (10, N'Clywd', N'123', 1)
SET IDENTITY_INSERT [dbo].[users] OFF
ALTER TABLE [dbo].[news]  WITH CHECK ADD FOREIGN KEY([category_id])
REFERENCES [dbo].[categories] ([id])
GO
ALTER TABLE [dbo].[users]  WITH CHECK ADD CHECK  (([role]=(0) OR [role]=(1)))
GO
USE [master]
GO
ALTER DATABASE [TluNews] SET  READ_WRITE 
GO
