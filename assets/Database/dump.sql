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


--
-- Name: postgis; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS postgis WITH SCHEMA public;


--
-- Name: EXTENSION postgis; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION postgis IS 'PostGIS geometry, geography, and raster spatial types and functions';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: tb_tweet; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tb_tweet (
    id_tweet text NOT NULL,
    id_user text,
    name text,
    screen_name text,
    tweet_content text,
    lat real,
    long real,
    created_at text
);


ALTER TABLE public.tb_tweet OWNER TO postgres;

--
-- Name: tb_user; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tb_user (
    id integer NOT NULL,
    name text,
    username text,
    password text
);


ALTER TABLE public.tb_user OWNER TO postgres;

--
-- Data for Name: spatial_ref_sys; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: tb_tweet; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tb_tweet VALUES ('923562767012978693', '1377118675', 'meily fatanagina', 'MFatanagina', 'Hampir semua client makeup aku selalu tanya warna shade lipcream ini kalau aku makeup in… https://t.co/pnxjjPKcve', -5.41633844, 105.248238, 'Thu Oct 26 14:51:37 +0000 2017');
INSERT INTO tb_tweet VALUES ('923553373353324545', '153478134', 'handy wiradharma', 'handywiradharma', 'I''m at Toko Aneka Sari Rasa https://t.co/BX1EiGkQP0', -5.44866133, 105.262466, 'Thu Oct 26 14:14:17 +0000 2017');
INSERT INTO tb_tweet VALUES ('923556785893634049', '634355747', 'poo', 'ViinaNhadir_', 'not everyone is predictable😉 #candid #lfl @ Tanjung Karang Pusat https://t.co/D8NiyunCJK', -5.4144206, 105.23732, 'Thu Oct 26 14:27:51 +0000 2017');
INSERT INTO tb_tweet VALUES ('923546934953918464', '94031431', 'Eva Widaranti', 'EvaaSaid92', 'At Hotel Nusantara — https://t.co/JqOu8QIH7X', -5.39624977, 105.290199, 'Thu Oct 26 13:48:42 +0000 2017');
INSERT INTO tb_tweet VALUES ('923464368246874113', '404063785', 'fita ansela 막내', 'maknae_fita', 'No caption needed @ Damai Coffee Roastery https://t.co/BSNXUSRoim', -5.44418383, 105.280632, 'Thu Oct 26 08:20:37 +0000 2017');
INSERT INTO tb_tweet VALUES ('923460179601055744', '121280724', 'romy enterprise', 'romy_enterprise', 'Izin repost om irsanmurhan Taken by @AdjiMix @ Bandar Lampung https://t.co/jwydqVjtlq', -5.44999981, 105.26667, 'Thu Oct 26 08:03:58 +0000 2017');
INSERT INTO tb_tweet VALUES ('923394452772700160', '1419674881', 'Idris fardiyansyah', 'idris_f1996', 'At IGD RS Urip Sumoharjo — https://t.co/tdgOWRZG6P', -5.39245987, 105.277962, 'Thu Oct 26 03:42:48 +0000 2017');
INSERT INTO tb_tweet VALUES ('923376990937321472', '104022535', 'arie tomat', 'arietomat', 'Ikutan yuk... Acara keren nih repost genpi_lampung<br>by media.repost:<br>El''s Coffee Lab by El''s… https://t.co/jFZmIDz3Ka', -5.44451237, 105.273003, 'Thu Oct 26 02:33:24 +0000 2017');
INSERT INTO tb_tweet VALUES ('923379203206152197', '574470458', 'MDS', 'meidadwi', 'Istri itu baik buruknya tergantung suami.<br><br>cantik, bila si suami… https://t.co/1jUgXhAHws', -5.43436384, 105.258347, 'Thu Oct 26 02:42:12 +0000 2017');
INSERT INTO tb_tweet VALUES ('923390323362996224', '467668087', 'Rian D''MASIV', 'RianEkkyP', 'mencari inspirasi sejenak.. lepas dari hiruk pikuk nya dunia.. @ B.lampung kemiling city https://t.co/fAi8ot2dcP', -5.39215469, 105.219475, 'Thu Oct 26 03:26:23 +0000 2017');
INSERT INTO tb_tweet VALUES ('923401207837630464', '1348579040', 'I. W. Setyawan', 'IrfanWahyu20', 'With Naafi, Bony, and KontingenDIY at @gorsaburai — https://t.co/PwzcawMHBm', -5.41955996, 105.260582, 'Thu Oct 26 04:09:38 +0000 2017');


--
-- Data for Name: tb_user; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tb_user VALUES (0, 'Prasetyo Sudarji', 'admin', 'admin');


--
-- Name: pk_tb_user; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_user
    ADD CONSTRAINT pk_tb_user PRIMARY KEY (id);


--
-- Name: tb_tweet_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tb_tweet
    ADD CONSTRAINT tb_tweet_pkey PRIMARY KEY (id_tweet);


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

