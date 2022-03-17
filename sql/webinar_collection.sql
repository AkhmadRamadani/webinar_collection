/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     17/03/2022 09:50:21                          */
/*==============================================================*/


drop table if exists ACC_WEBINAR;

drop table if exists KATEGORI;

drop table if exists USER;

drop table if exists WEBINAR;

drop table if exists WEBINAR_KATEGORI;

drop table if exists WEBINAR_REGIST;

/*==============================================================*/
/* Table: ACC_WEBINAR                                           */
/*==============================================================*/
create table ACC_WEBINAR
(
   USER_ID              int(255) not null,
   WEBINAR_ID           int(255) not null,
   PESAN                text,
   STATUS_PROPOSAL      int(1),
   primary key (USER_ID, WEBINAR_ID)
);

/*==============================================================*/
/* Table: KATEGORI                                              */
/*==============================================================*/
create table KATEGORI
(
   KATEGORI_ID          int(3) not null,
   NAMA_KATEGORI        varchar(50),
   ICON_KATEGORI        varchar(200),
   primary key (KATEGORI_ID)
);

/*==============================================================*/
/* Table: USER                                                  */
/*==============================================================*/
create table USER
(
   USER_ID              int(255) not null,
   NAMA                 varchar(200),
   EMAIL                varchar(100),
   PASSWORD             varchar(256),
   ROLE                 int(1),
   primary key (USER_ID)
);

/*==============================================================*/
/* Table: WEBINAR                                               */
/*==============================================================*/
create table WEBINAR
(
   WEBINAR_ID           int(255) not null,
   USER_ID              int(255),
   JUDUL_WEBINAR        varchar(200),
   DESKRIPSI_WEBINAR    text,
   WAKTU_WEBINAR        datetime,
   MAKS_KAPASITAS       int(3),
   LINK_MEETING         text,
   COVER_WEBINAR        varchar(200),
   primary key (WEBINAR_ID)
);

/*==============================================================*/
/* Table: WEBINAR_KATEGORI                                      */
/*==============================================================*/
create table WEBINAR_KATEGORI
(
   KATEGORI_ID          int(3) not null,
   WEBINAR_ID           int(255) not null,
   primary key (KATEGORI_ID, WEBINAR_ID)
);

/*==============================================================*/
/* Table: WEBINAR_REGIST                                        */
/*==============================================================*/
create table WEBINAR_REGIST
(
   USER_ID              int(255) not null,
   WEBINAR_ID           int(255) not null,
   primary key (USER_ID, WEBINAR_ID)
);

alter table ACC_WEBINAR add constraint FK_ACC_WEBINAR foreign key (USER_ID)
      references USER (USER_ID) on delete restrict on update restrict;

alter table ACC_WEBINAR add constraint FK_ACC_WEBINAR2 foreign key (WEBINAR_ID)
      references WEBINAR (WEBINAR_ID) on delete restrict on update restrict;

alter table WEBINAR add constraint FK_CREATE_WEBINAR foreign key (USER_ID)
      references USER (USER_ID) on delete restrict on update restrict;

alter table WEBINAR_KATEGORI add constraint FK_WEBINAR_KATEGORI foreign key (KATEGORI_ID)
      references KATEGORI (KATEGORI_ID) on delete restrict on update restrict;

alter table WEBINAR_KATEGORI add constraint FK_WEBINAR_KATEGORI2 foreign key (WEBINAR_ID)
      references WEBINAR (WEBINAR_ID) on delete restrict on update restrict;

alter table WEBINAR_REGIST add constraint FK_WEBINAR_REGIST foreign key (USER_ID)
      references USER (USER_ID) on delete restrict on update restrict;

alter table WEBINAR_REGIST add constraint FK_WEBINAR_REGIST2 foreign key (WEBINAR_ID)
      references WEBINAR (WEBINAR_ID) on delete restrict on update restrict;

