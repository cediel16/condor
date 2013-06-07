--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: permisos; Type: TABLE; Schema: public; Owner: johel; Tablespace: 
--

CREATE TABLE permisos (
    id integer NOT NULL,
    permiso character varying(80) NOT NULL
);


ALTER TABLE public.permisos OWNER TO johel;

--
-- Name: permisos_id_seq; Type: SEQUENCE; Schema: public; Owner: johel
--

CREATE SEQUENCE permisos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.permisos_id_seq OWNER TO johel;

--
-- Name: permisos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: johel
--

ALTER SEQUENCE permisos_id_seq OWNED BY permisos.id;


--
-- Name: permisos_roles; Type: TABLE; Schema: public; Owner: johel; Tablespace: 
--

CREATE TABLE permisos_roles (
    id integer NOT NULL,
    permiso_fkey integer NOT NULL,
    rol_fkey integer NOT NULL
);


ALTER TABLE public.permisos_roles OWNER TO johel;

--
-- Name: permisos_roles_id_seq; Type: SEQUENCE; Schema: public; Owner: johel
--

CREATE SEQUENCE permisos_roles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.permisos_roles_id_seq OWNER TO johel;

--
-- Name: permisos_roles_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: johel
--

ALTER SEQUENCE permisos_roles_id_seq OWNED BY permisos_roles.id;


--
-- Name: roles; Type: TABLE; Schema: public; Owner: johel; Tablespace: 
--

CREATE TABLE roles (
    id integer NOT NULL,
    rol character varying(80) NOT NULL
);


ALTER TABLE public.roles OWNER TO johel;

--
-- Name: roles_id_seq; Type: SEQUENCE; Schema: public; Owner: johel
--

CREATE SEQUENCE roles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.roles_id_seq OWNER TO johel;

--
-- Name: roles_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: johel
--

ALTER SEQUENCE roles_id_seq OWNED BY roles.id;


--
-- Name: roles_usuarios; Type: TABLE; Schema: public; Owner: johel; Tablespace: 
--

CREATE TABLE roles_usuarios (
    id integer NOT NULL,
    rol_fkey integer NOT NULL,
    usuario_fkey integer NOT NULL
);


ALTER TABLE public.roles_usuarios OWNER TO johel;

--
-- Name: roles_usuarios_id_seq; Type: SEQUENCE; Schema: public; Owner: johel
--

CREATE SEQUENCE roles_usuarios_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.roles_usuarios_id_seq OWNER TO johel;

--
-- Name: roles_usuarios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: johel
--

ALTER SEQUENCE roles_usuarios_id_seq OWNED BY roles_usuarios.id;


--
-- Name: sessions; Type: TABLE; Schema: public; Owner: johel; Tablespace: 
--

CREATE TABLE sessions (
    session_id character varying(40) DEFAULT '0'::character varying NOT NULL,
    ip_address character varying(45) DEFAULT '0'::character varying NOT NULL,
    user_agent character varying(120) NOT NULL,
    last_activity integer DEFAULT 0 NOT NULL,
    user_data text NOT NULL
);


ALTER TABLE public.sessions OWNER TO johel;

--
-- Name: usuarios; Type: TABLE; Schema: public; Owner: johel; Tablespace: 
--

CREATE TABLE usuarios (
    id integer NOT NULL,
    email character varying(80) NOT NULL,
    clave character varying(128) NOT NULL,
    nombre character varying(80)
);


ALTER TABLE public.usuarios OWNER TO johel;

--
-- Name: usuarios_id_seq; Type: SEQUENCE; Schema: public; Owner: johel
--

CREATE SEQUENCE usuarios_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuarios_id_seq OWNER TO johel;

--
-- Name: usuarios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: johel
--

ALTER SEQUENCE usuarios_id_seq OWNED BY usuarios.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: johel
--

ALTER TABLE ONLY permisos ALTER COLUMN id SET DEFAULT nextval('permisos_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: johel
--

ALTER TABLE ONLY permisos_roles ALTER COLUMN id SET DEFAULT nextval('permisos_roles_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: johel
--

ALTER TABLE ONLY roles ALTER COLUMN id SET DEFAULT nextval('roles_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: johel
--

ALTER TABLE ONLY roles_usuarios ALTER COLUMN id SET DEFAULT nextval('roles_usuarios_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: johel
--

ALTER TABLE ONLY usuarios ALTER COLUMN id SET DEFAULT nextval('usuarios_id_seq'::regclass);


--
-- Data for Name: permisos; Type: TABLE DATA; Schema: public; Owner: johel
--

COPY permisos (id, permiso) FROM stdin;
\.


--
-- Name: permisos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: johel
--

SELECT pg_catalog.setval('permisos_id_seq', 1, false);


--
-- Data for Name: permisos_roles; Type: TABLE DATA; Schema: public; Owner: johel
--

COPY permisos_roles (id, permiso_fkey, rol_fkey) FROM stdin;
\.


--
-- Name: permisos_roles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: johel
--

SELECT pg_catalog.setval('permisos_roles_id_seq', 1, false);


--
-- Data for Name: roles; Type: TABLE DATA; Schema: public; Owner: johel
--

COPY roles (id, rol) FROM stdin;
\.


--
-- Name: roles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: johel
--

SELECT pg_catalog.setval('roles_id_seq', 1, false);


--
-- Data for Name: roles_usuarios; Type: TABLE DATA; Schema: public; Owner: johel
--

COPY roles_usuarios (id, rol_fkey, usuario_fkey) FROM stdin;
\.


--
-- Name: roles_usuarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: johel
--

SELECT pg_catalog.setval('roles_usuarios_id_seq', 1, false);


--
-- Data for Name: sessions; Type: TABLE DATA; Schema: public; Owner: johel
--

COPY sessions (session_id, ip_address, user_agent, last_activity, user_data) FROM stdin;
114113bfe89a942414085878bf023e4d	::1	Mozilla/5.0 (X11; Linux i686; rv:21.0) Gecko/20100101 Firefox/21.0	1370489491	
\.


--
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: johel
--

COPY usuarios (id, email, clave, nombre) FROM stdin;
1	admin@condor.com	e10adc3949ba59abbe56e057f20f883e	Administrador Condor
\.


--
-- Name: usuarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: johel
--

SELECT pg_catalog.setval('usuarios_id_seq', 1, true);


--
-- Name: permisos_permiso_key; Type: CONSTRAINT; Schema: public; Owner: johel; Tablespace: 
--

ALTER TABLE ONLY permisos
    ADD CONSTRAINT permisos_permiso_key UNIQUE (permiso);


--
-- Name: permisos_pkey; Type: CONSTRAINT; Schema: public; Owner: johel; Tablespace: 
--

ALTER TABLE ONLY permisos
    ADD CONSTRAINT permisos_pkey PRIMARY KEY (id);


--
-- Name: permisos_roles_pkey; Type: CONSTRAINT; Schema: public; Owner: johel; Tablespace: 
--

ALTER TABLE ONLY permisos_roles
    ADD CONSTRAINT permisos_roles_pkey PRIMARY KEY (id);


--
-- Name: roles_pkey; Type: CONSTRAINT; Schema: public; Owner: johel; Tablespace: 
--

ALTER TABLE ONLY roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (id);


--
-- Name: roles_rol_key; Type: CONSTRAINT; Schema: public; Owner: johel; Tablespace: 
--

ALTER TABLE ONLY roles
    ADD CONSTRAINT roles_rol_key UNIQUE (rol);


--
-- Name: roles_usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: johel; Tablespace: 
--

ALTER TABLE ONLY roles_usuarios
    ADD CONSTRAINT roles_usuarios_pkey PRIMARY KEY (id);


--
-- Name: sessions_pkey; Type: CONSTRAINT; Schema: public; Owner: johel; Tablespace: 
--

ALTER TABLE ONLY sessions
    ADD CONSTRAINT sessions_pkey PRIMARY KEY (session_id);


--
-- Name: usuarios_email_key; Type: CONSTRAINT; Schema: public; Owner: johel; Tablespace: 
--

ALTER TABLE ONLY usuarios
    ADD CONSTRAINT usuarios_email_key UNIQUE (email);


--
-- Name: usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: johel; Tablespace: 
--

ALTER TABLE ONLY usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id);


--
-- Name: sessions_last_activity_idx; Type: INDEX; Schema: public; Owner: johel; Tablespace: 
--

CREATE INDEX sessions_last_activity_idx ON sessions USING btree (last_activity);


--
-- Name: permisos_roles_permiso_fkey_fkey; Type: FK CONSTRAINT; Schema: public; Owner: johel
--

ALTER TABLE ONLY permisos_roles
    ADD CONSTRAINT permisos_roles_permiso_fkey_fkey FOREIGN KEY (permiso_fkey) REFERENCES permisos(id);


--
-- Name: permisos_roles_rol_fkey_fkey; Type: FK CONSTRAINT; Schema: public; Owner: johel
--

ALTER TABLE ONLY permisos_roles
    ADD CONSTRAINT permisos_roles_rol_fkey_fkey FOREIGN KEY (rol_fkey) REFERENCES roles(id);


--
-- Name: roles_usuarios_rol_fkey_fkey; Type: FK CONSTRAINT; Schema: public; Owner: johel
--

ALTER TABLE ONLY roles_usuarios
    ADD CONSTRAINT roles_usuarios_rol_fkey_fkey FOREIGN KEY (rol_fkey) REFERENCES roles(id);


--
-- Name: roles_usuarios_usuario_fkey_fkey; Type: FK CONSTRAINT; Schema: public; Owner: johel
--

ALTER TABLE ONLY roles_usuarios
    ADD CONSTRAINT roles_usuarios_usuario_fkey_fkey FOREIGN KEY (usuario_fkey) REFERENCES usuarios(id);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

