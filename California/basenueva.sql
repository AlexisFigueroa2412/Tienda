PGDMP                         y            123    13.2    13.2 L               0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false                       0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false                       1262    20257    123    DATABASE     i   CREATE DATABASE "123" WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'English_United States.utf8';
    DROP DATABASE "123";
                postgres    false            �            1259    20258    tbCategorias    TABLE     t   CREATE TABLE public."tbCategorias" (
    id_categoria integer NOT NULL,
    categoria character varying NOT NULL
);
 "   DROP TABLE public."tbCategorias";
       public         heap    postgres    false            �            1259    20264    tbCategorias_id_categoria_seq    SEQUENCE     �   CREATE SEQUENCE public."tbCategorias_id_categoria_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 6   DROP SEQUENCE public."tbCategorias_id_categoria_seq";
       public          postgres    false    200                       0    0    tbCategorias_id_categoria_seq    SEQUENCE OWNED BY     c   ALTER SEQUENCE public."tbCategorias_id_categoria_seq" OWNED BY public."tbCategorias".id_categoria;
          public          postgres    false    201            �            1259    20266 
   tbClientes    TABLE     �  CREATE TABLE public."tbClientes" (
    id_cliente integer NOT NULL,
    nombre_cliente character varying(100) NOT NULL,
    apellido_cliente character varying(150) NOT NULL,
    telefono_cliente character varying(9) NOT NULL,
    correo_cliente character varying(50) NOT NULL,
    clave_cliente character varying(500) NOT NULL,
    estado_cliente boolean NOT NULL,
    cambio_clave date NOT NULL,
    codigo integer,
    factor boolean NOT NULL
);
     DROP TABLE public."tbClientes";
       public         heap    postgres    false            �            1259    20272    tbClientes_id_cliente_seq    SEQUENCE     �   CREATE SEQUENCE public."tbClientes_id_cliente_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public."tbClientes_id_cliente_seq";
       public          postgres    false    202                       0    0    tbClientes_id_cliente_seq    SEQUENCE OWNED BY     [   ALTER SEQUENCE public."tbClientes_id_cliente_seq" OWNED BY public."tbClientes".id_cliente;
          public          postgres    false    203            �            1259    20274    tbDetalle_pedido    TABLE     �   CREATE TABLE public."tbDetalle_pedido" (
    id_detalle integer NOT NULL,
    id_producto integer NOT NULL,
    cantidad_producto integer NOT NULL,
    precio_producto numeric(5,2) NOT NULL,
    id_pedido integer NOT NULL
);
 &   DROP TABLE public."tbDetalle_pedido";
       public         heap    postgres    false            �            1259    20277    tbDetalle_pedido_id_detalle_seq    SEQUENCE     �   CREATE SEQUENCE public."tbDetalle_pedido_id_detalle_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 8   DROP SEQUENCE public."tbDetalle_pedido_id_detalle_seq";
       public          postgres    false    204                       0    0    tbDetalle_pedido_id_detalle_seq    SEQUENCE OWNED BY     g   ALTER SEQUENCE public."tbDetalle_pedido_id_detalle_seq" OWNED BY public."tbDetalle_pedido".id_detalle;
          public          postgres    false    205            �            1259    20279 	   tbPedidos    TABLE     �   CREATE TABLE public."tbPedidos" (
    id_pedido integer NOT NULL,
    id_cliente integer NOT NULL,
    estado_pedido character(1) DEFAULT 0 NOT NULL,
    fecha_pedido date
);
    DROP TABLE public."tbPedidos";
       public         heap    postgres    false            �            1259    20283    tbPedidos_id_pedido_seq    SEQUENCE     �   CREATE SEQUENCE public."tbPedidos_id_pedido_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE public."tbPedidos_id_pedido_seq";
       public          postgres    false    206                       0    0    tbPedidos_id_pedido_seq    SEQUENCE OWNED BY     W   ALTER SEQUENCE public."tbPedidos_id_pedido_seq" OWNED BY public."tbPedidos".id_pedido;
          public          postgres    false    207            �            1259    20285    tbProductos    TABLE     �  CREATE TABLE public."tbProductos" (
    id_producto integer NOT NULL,
    id_categoria integer NOT NULL,
    nombre_producto character varying(100) NOT NULL,
    precio_producto numeric(5,2) NOT NULL,
    descripcion_producto character varying(500) NOT NULL,
    cantidad_total integer NOT NULL,
    marca_producto character varying(100) NOT NULL,
    estado_producto boolean NOT NULL,
    foto character varying(500) NOT NULL
);
 !   DROP TABLE public."tbProductos";
       public         heap    postgres    false            �            1259    20291    tbProductos_id_producto_seq    SEQUENCE     �   CREATE SEQUENCE public."tbProductos_id_producto_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public."tbProductos_id_producto_seq";
       public          postgres    false    208                       0    0    tbProductos_id_producto_seq    SEQUENCE OWNED BY     _   ALTER SEQUENCE public."tbProductos_id_producto_seq" OWNED BY public."tbProductos".id_producto;
          public          postgres    false    209            �            1259    20293    tbSesionesPb    TABLE     �   CREATE TABLE public."tbSesionesPb" (
    id_sesion integer NOT NULL,
    fecha_sesion date NOT NULL,
    exito boolean NOT NULL,
    id_cliente integer NOT NULL,
    hora time without time zone NOT NULL
);
 "   DROP TABLE public."tbSesionesPb";
       public         heap    postgres    false            �            1259    20296    tbSesionesPb_id_sesion_seq    SEQUENCE     �   CREATE SEQUENCE public."tbSesionesPb_id_sesion_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public."tbSesionesPb_id_sesion_seq";
       public          postgres    false    210                       0    0    tbSesionesPb_id_sesion_seq    SEQUENCE OWNED BY     ]   ALTER SEQUENCE public."tbSesionesPb_id_sesion_seq" OWNED BY public."tbSesionesPb".id_sesion;
          public          postgres    false    211            �            1259    20298    tbSesionesPv    TABLE     �   CREATE TABLE public."tbSesionesPv" (
    id_sesion integer NOT NULL,
    fecha_sesion date NOT NULL,
    exito boolean NOT NULL,
    id_usuario integer NOT NULL,
    hora time without time zone NOT NULL
);
 "   DROP TABLE public."tbSesionesPv";
       public         heap    postgres    false            �            1259    20301    tbSesionesPv_id_sesion_seq    SEQUENCE     �   CREATE SEQUENCE public."tbSesionesPv_id_sesion_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public."tbSesionesPv_id_sesion_seq";
       public          postgres    false    212                       0    0    tbSesionesPv_id_sesion_seq    SEQUENCE OWNED BY     ]   ALTER SEQUENCE public."tbSesionesPv_id_sesion_seq" OWNED BY public."tbSesionesPv".id_sesion;
          public          postgres    false    213            �            1259    20303 
   tbUsuarios    TABLE     �  CREATE TABLE public."tbUsuarios" (
    id_usuario integer NOT NULL,
    nombre_usuario character varying(100) NOT NULL,
    apellidos_usuario character varying(250) NOT NULL,
    correo_usuario character varying(50) NOT NULL,
    alias_usuario character varying(50) NOT NULL,
    estado_usuario boolean NOT NULL,
    clave_usuario character varying(500) NOT NULL,
    cambio_clave date NOT NULL,
    codigo integer,
    factor boolean NOT NULL
);
     DROP TABLE public."tbUsuarios";
       public         heap    postgres    false            �            1259    20309    tbUsuarios_id_usuario_seq    SEQUENCE     �   CREATE SEQUENCE public."tbUsuarios_id_usuario_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public."tbUsuarios_id_usuario_seq";
       public          postgres    false    214                       0    0    tbUsuarios_id_usuario_seq    SEQUENCE OWNED BY     [   ALTER SEQUENCE public."tbUsuarios_id_usuario_seq" OWNED BY public."tbUsuarios".id_usuario;
          public          postgres    false    215            �            1259    20311    tbValoracion    TABLE     �   CREATE TABLE public."tbValoracion" (
    id_valoracion integer NOT NULL,
    id_cliente integer NOT NULL,
    id_producto integer NOT NULL,
    comentario character varying(500),
    calificacion integer
);
 "   DROP TABLE public."tbValoracion";
       public         heap    postgres    false            �            1259    20317    tbValoracion_id_valoracion_seq    SEQUENCE     �   CREATE SEQUENCE public."tbValoracion_id_valoracion_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 7   DROP SEQUENCE public."tbValoracion_id_valoracion_seq";
       public          postgres    false    216                       0    0    tbValoracion_id_valoracion_seq    SEQUENCE OWNED BY     e   ALTER SEQUENCE public."tbValoracion_id_valoracion_seq" OWNED BY public."tbValoracion".id_valoracion;
          public          postgres    false    217            W           2604    20319    tbCategorias id_categoria    DEFAULT     �   ALTER TABLE ONLY public."tbCategorias" ALTER COLUMN id_categoria SET DEFAULT nextval('public."tbCategorias_id_categoria_seq"'::regclass);
 J   ALTER TABLE public."tbCategorias" ALTER COLUMN id_categoria DROP DEFAULT;
       public          postgres    false    201    200            X           2604    20320    tbClientes id_cliente    DEFAULT     �   ALTER TABLE ONLY public."tbClientes" ALTER COLUMN id_cliente SET DEFAULT nextval('public."tbClientes_id_cliente_seq"'::regclass);
 F   ALTER TABLE public."tbClientes" ALTER COLUMN id_cliente DROP DEFAULT;
       public          postgres    false    203    202            Y           2604    20321    tbDetalle_pedido id_detalle    DEFAULT     �   ALTER TABLE ONLY public."tbDetalle_pedido" ALTER COLUMN id_detalle SET DEFAULT nextval('public."tbDetalle_pedido_id_detalle_seq"'::regclass);
 L   ALTER TABLE public."tbDetalle_pedido" ALTER COLUMN id_detalle DROP DEFAULT;
       public          postgres    false    205    204            [           2604    20322    tbPedidos id_pedido    DEFAULT     ~   ALTER TABLE ONLY public."tbPedidos" ALTER COLUMN id_pedido SET DEFAULT nextval('public."tbPedidos_id_pedido_seq"'::regclass);
 D   ALTER TABLE public."tbPedidos" ALTER COLUMN id_pedido DROP DEFAULT;
       public          postgres    false    207    206            \           2604    20323    tbProductos id_producto    DEFAULT     �   ALTER TABLE ONLY public."tbProductos" ALTER COLUMN id_producto SET DEFAULT nextval('public."tbProductos_id_producto_seq"'::regclass);
 H   ALTER TABLE public."tbProductos" ALTER COLUMN id_producto DROP DEFAULT;
       public          postgres    false    209    208            ]           2604    20324    tbSesionesPb id_sesion    DEFAULT     �   ALTER TABLE ONLY public."tbSesionesPb" ALTER COLUMN id_sesion SET DEFAULT nextval('public."tbSesionesPb_id_sesion_seq"'::regclass);
 G   ALTER TABLE public."tbSesionesPb" ALTER COLUMN id_sesion DROP DEFAULT;
       public          postgres    false    211    210            ^           2604    20325    tbSesionesPv id_sesion    DEFAULT     �   ALTER TABLE ONLY public."tbSesionesPv" ALTER COLUMN id_sesion SET DEFAULT nextval('public."tbSesionesPv_id_sesion_seq"'::regclass);
 G   ALTER TABLE public."tbSesionesPv" ALTER COLUMN id_sesion DROP DEFAULT;
       public          postgres    false    213    212            _           2604    20326    tbUsuarios id_usuario    DEFAULT     �   ALTER TABLE ONLY public."tbUsuarios" ALTER COLUMN id_usuario SET DEFAULT nextval('public."tbUsuarios_id_usuario_seq"'::regclass);
 F   ALTER TABLE public."tbUsuarios" ALTER COLUMN id_usuario DROP DEFAULT;
       public          postgres    false    215    214            `           2604    20327    tbValoracion id_valoracion    DEFAULT     �   ALTER TABLE ONLY public."tbValoracion" ALTER COLUMN id_valoracion SET DEFAULT nextval('public."tbValoracion_id_valoracion_seq"'::regclass);
 K   ALTER TABLE public."tbValoracion" ALTER COLUMN id_valoracion DROP DEFAULT;
       public          postgres    false    217    216            �          0    20258    tbCategorias 
   TABLE DATA           A   COPY public."tbCategorias" (id_categoria, categoria) FROM stdin;
    public          postgres    false    200   �_                 0    20266 
   tbClientes 
   TABLE DATA           �   COPY public."tbClientes" (id_cliente, nombre_cliente, apellido_cliente, telefono_cliente, correo_cliente, clave_cliente, estado_cliente, cambio_clave, codigo, factor) FROM stdin;
    public          postgres    false    202   �_                 0    20274    tbDetalle_pedido 
   TABLE DATA           t   COPY public."tbDetalle_pedido" (id_detalle, id_producto, cantidad_producto, precio_producto, id_pedido) FROM stdin;
    public          postgres    false    204   �_                 0    20279 	   tbPedidos 
   TABLE DATA           Y   COPY public."tbPedidos" (id_pedido, id_cliente, estado_pedido, fecha_pedido) FROM stdin;
    public          postgres    false    206   �_                 0    20285    tbProductos 
   TABLE DATA           �   COPY public."tbProductos" (id_producto, id_categoria, nombre_producto, precio_producto, descripcion_producto, cantidad_total, marca_producto, estado_producto, foto) FROM stdin;
    public          postgres    false    208   `       	          0    20293    tbSesionesPb 
   TABLE DATA           Z   COPY public."tbSesionesPb" (id_sesion, fecha_sesion, exito, id_cliente, hora) FROM stdin;
    public          postgres    false    210   9`                 0    20298    tbSesionesPv 
   TABLE DATA           Z   COPY public."tbSesionesPv" (id_sesion, fecha_sesion, exito, id_usuario, hora) FROM stdin;
    public          postgres    false    212   V`                 0    20303 
   tbUsuarios 
   TABLE DATA           �   COPY public."tbUsuarios" (id_usuario, nombre_usuario, apellidos_usuario, correo_usuario, alias_usuario, estado_usuario, clave_usuario, cambio_clave, codigo, factor) FROM stdin;
    public          postgres    false    214   s`                 0    20311    tbValoracion 
   TABLE DATA           j   COPY public."tbValoracion" (id_valoracion, id_cliente, id_producto, comentario, calificacion) FROM stdin;
    public          postgres    false    216   �`                   0    0    tbCategorias_id_categoria_seq    SEQUENCE SET     M   SELECT pg_catalog.setval('public."tbCategorias_id_categoria_seq"', 3, true);
          public          postgres    false    201            !           0    0    tbClientes_id_cliente_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public."tbClientes_id_cliente_seq"', 4, true);
          public          postgres    false    203            "           0    0    tbDetalle_pedido_id_detalle_seq    SEQUENCE SET     P   SELECT pg_catalog.setval('public."tbDetalle_pedido_id_detalle_seq"', 17, true);
          public          postgres    false    205            #           0    0    tbPedidos_id_pedido_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('public."tbPedidos_id_pedido_seq"', 53, true);
          public          postgres    false    207            $           0    0    tbProductos_id_producto_seq    SEQUENCE SET     K   SELECT pg_catalog.setval('public."tbProductos_id_producto_seq"', 6, true);
          public          postgres    false    209            %           0    0    tbSesionesPb_id_sesion_seq    SEQUENCE SET     K   SELECT pg_catalog.setval('public."tbSesionesPb_id_sesion_seq"', 24, true);
          public          postgres    false    211            &           0    0    tbSesionesPv_id_sesion_seq    SEQUENCE SET     K   SELECT pg_catalog.setval('public."tbSesionesPv_id_sesion_seq"', 32, true);
          public          postgres    false    213            '           0    0    tbUsuarios_id_usuario_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public."tbUsuarios_id_usuario_seq"', 9, true);
          public          postgres    false    215            (           0    0    tbValoracion_id_valoracion_seq    SEQUENCE SET     O   SELECT pg_catalog.setval('public."tbValoracion_id_valoracion_seq"', 10, true);
          public          postgres    false    217            n           2606    20387    tbUsuarios Uk_alias 
   CONSTRAINT     [   ALTER TABLE ONLY public."tbUsuarios"
    ADD CONSTRAINT "Uk_alias" UNIQUE (alias_usuario);
 A   ALTER TABLE ONLY public."tbUsuarios" DROP CONSTRAINT "Uk_alias";
       public            postgres    false    214            p           2606    20385    tbUsuarios Uk_email 
   CONSTRAINT     \   ALTER TABLE ONLY public."tbUsuarios"
    ADD CONSTRAINT "Uk_email" UNIQUE (correo_usuario);
 A   ALTER TABLE ONLY public."tbUsuarios" DROP CONSTRAINT "Uk_email";
       public            postgres    false    214            b           2606    20329    tbCategorias tbCategorias_pkey 
   CONSTRAINT     j   ALTER TABLE ONLY public."tbCategorias"
    ADD CONSTRAINT "tbCategorias_pkey" PRIMARY KEY (id_categoria);
 L   ALTER TABLE ONLY public."tbCategorias" DROP CONSTRAINT "tbCategorias_pkey";
       public            postgres    false    200            d           2606    20331    tbClientes tbClientes_pkey 
   CONSTRAINT     d   ALTER TABLE ONLY public."tbClientes"
    ADD CONSTRAINT "tbClientes_pkey" PRIMARY KEY (id_cliente);
 H   ALTER TABLE ONLY public."tbClientes" DROP CONSTRAINT "tbClientes_pkey";
       public            postgres    false    202            f           2606    20333 &   tbDetalle_pedido tbDetalle_pedido_pkey 
   CONSTRAINT     p   ALTER TABLE ONLY public."tbDetalle_pedido"
    ADD CONSTRAINT "tbDetalle_pedido_pkey" PRIMARY KEY (id_detalle);
 T   ALTER TABLE ONLY public."tbDetalle_pedido" DROP CONSTRAINT "tbDetalle_pedido_pkey";
       public            postgres    false    204            h           2606    20335    tbPedidos tbPedidos_pkey 
   CONSTRAINT     a   ALTER TABLE ONLY public."tbPedidos"
    ADD CONSTRAINT "tbPedidos_pkey" PRIMARY KEY (id_pedido);
 F   ALTER TABLE ONLY public."tbPedidos" DROP CONSTRAINT "tbPedidos_pkey";
       public            postgres    false    206            j           2606    20337    tbProductos tbProductos_pkey 
   CONSTRAINT     g   ALTER TABLE ONLY public."tbProductos"
    ADD CONSTRAINT "tbProductos_pkey" PRIMARY KEY (id_producto);
 J   ALTER TABLE ONLY public."tbProductos" DROP CONSTRAINT "tbProductos_pkey";
       public            postgres    false    208            l           2606    20339    tbSesionesPb tbSesionesPb_pkey 
   CONSTRAINT     g   ALTER TABLE ONLY public."tbSesionesPb"
    ADD CONSTRAINT "tbSesionesPb_pkey" PRIMARY KEY (id_sesion);
 L   ALTER TABLE ONLY public."tbSesionesPb" DROP CONSTRAINT "tbSesionesPb_pkey";
       public            postgres    false    210            r           2606    20341    tbUsuarios tbUsuarios_pkey 
   CONSTRAINT     d   ALTER TABLE ONLY public."tbUsuarios"
    ADD CONSTRAINT "tbUsuarios_pkey" PRIMARY KEY (id_usuario);
 H   ALTER TABLE ONLY public."tbUsuarios" DROP CONSTRAINT "tbUsuarios_pkey";
       public            postgres    false    214            t           2606    20343    tbValoracion tbValoracion_pkey 
   CONSTRAINT     k   ALTER TABLE ONLY public."tbValoracion"
    ADD CONSTRAINT "tbValoracion_pkey" PRIMARY KEY (id_valoracion);
 L   ALTER TABLE ONLY public."tbValoracion" DROP CONSTRAINT "tbValoracion_pkey";
       public            postgres    false    216            x           2606    20344    tbProductos fkCat    FK CONSTRAINT     �   ALTER TABLE ONLY public."tbProductos"
    ADD CONSTRAINT "fkCat" FOREIGN KEY (id_categoria) REFERENCES public."tbCategorias"(id_categoria) NOT VALID;
 ?   ALTER TABLE ONLY public."tbProductos" DROP CONSTRAINT "fkCat";
       public          postgres    false    200    2914    208            w           2606    20349    tbPedidos fkCli    FK CONSTRAINT     �   ALTER TABLE ONLY public."tbPedidos"
    ADD CONSTRAINT "fkCli" FOREIGN KEY (id_cliente) REFERENCES public."tbClientes"(id_cliente);
 =   ALTER TABLE ONLY public."tbPedidos" DROP CONSTRAINT "fkCli";
       public          postgres    false    206    2916    202            {           2606    20354    tbValoracion fkPr    FK CONSTRAINT     �   ALTER TABLE ONLY public."tbValoracion"
    ADD CONSTRAINT "fkPr" FOREIGN KEY (id_producto) REFERENCES public."tbProductos"(id_producto);
 ?   ALTER TABLE ONLY public."tbValoracion" DROP CONSTRAINT "fkPr";
       public          postgres    false    208    216    2922            |           2606    20359    tbValoracion fkUs    FK CONSTRAINT     �   ALTER TABLE ONLY public."tbValoracion"
    ADD CONSTRAINT "fkUs" FOREIGN KEY (id_cliente) REFERENCES public."tbClientes"(id_cliente);
 ?   ALTER TABLE ONLY public."tbValoracion" DROP CONSTRAINT "fkUs";
       public          postgres    false    2916    202    216            y           2606    20364    tbSesionesPb fk_cl    FK CONSTRAINT     �   ALTER TABLE ONLY public."tbSesionesPb"
    ADD CONSTRAINT fk_cl FOREIGN KEY (id_cliente) REFERENCES public."tbClientes"(id_cliente);
 >   ALTER TABLE ONLY public."tbSesionesPb" DROP CONSTRAINT fk_cl;
       public          postgres    false    210    202    2916            z           2606    20369    tbSesionesPv fk_us    FK CONSTRAINT     �   ALTER TABLE ONLY public."tbSesionesPv"
    ADD CONSTRAINT fk_us FOREIGN KEY (id_usuario) REFERENCES public."tbUsuarios"(id_usuario);
 >   ALTER TABLE ONLY public."tbSesionesPv" DROP CONSTRAINT fk_us;
       public          postgres    false    214    212    2930            u           2606    20374    tbDetalle_pedido fkpe    FK CONSTRAINT     �   ALTER TABLE ONLY public."tbDetalle_pedido"
    ADD CONSTRAINT fkpe FOREIGN KEY (id_pedido) REFERENCES public."tbPedidos"(id_pedido);
 A   ALTER TABLE ONLY public."tbDetalle_pedido" DROP CONSTRAINT fkpe;
       public          postgres    false    204    2920    206            v           2606    20379    tbDetalle_pedido fkpro    FK CONSTRAINT     �   ALTER TABLE ONLY public."tbDetalle_pedido"
    ADD CONSTRAINT fkpro FOREIGN KEY (id_producto) REFERENCES public."tbProductos"(id_producto);
 B   ALTER TABLE ONLY public."tbDetalle_pedido" DROP CONSTRAINT fkpro;
       public          postgres    false    2922    208    204            �      x������ � �            x������ � �            x������ � �            x������ � �            x������ � �      	      x������ � �            x������ � �            x������ � �            x������ � �     