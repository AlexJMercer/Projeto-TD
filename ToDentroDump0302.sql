--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
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
-- Name: alimentos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE alimentos (
    id integer NOT NULL,
    alimento character varying(150) NOT NULL
);


ALTER TABLE public.alimentos OWNER TO postgres;

--
-- Name: alimentos_cardapios; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE alimentos_cardapios (
    id_cad integer NOT NULL,
    id_ali integer NOT NULL
);


ALTER TABLE public.alimentos_cardapios OWNER TO postgres;

--
-- Name: alimentos_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE alimentos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.alimentos_id_seq OWNER TO postgres;

--
-- Name: alimentos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE alimentos_id_seq OWNED BY alimentos.id;


--
-- Name: assistencias; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE assistencias (
    id_assist integer NOT NULL,
    assist character varying(150) NOT NULL,
    texto text NOT NULL
);


ALTER TABLE public.assistencias OWNER TO postgres;

--
-- Name: assistencias_id_assist_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE assistencias_id_assist_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.assistencias_id_assist_seq OWNER TO postgres;

--
-- Name: assistencias_id_assist_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE assistencias_id_assist_seq OWNED BY assistencias.id_assist;


--
-- Name: cardapios; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cardapios (
    id_card integer NOT NULL,
    dia integer NOT NULL,
    data date NOT NULL
);


ALTER TABLE public.cardapios OWNER TO postgres;

--
-- Name: cardapios_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cardapios_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cardapios_id_seq OWNER TO postgres;

--
-- Name: cardapios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE cardapios_id_seq OWNED BY cardapios.id_card;


--
-- Name: cat_noticias; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cat_noticias (
    catnews_id integer NOT NULL,
    catnews_text character varying(100) NOT NULL
);


ALTER TABLE public.cat_noticias OWNER TO postgres;

--
-- Name: cat_noticias_catnews_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cat_noticias_catnews_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cat_noticias_catnews_id_seq OWNER TO postgres;

--
-- Name: cat_noticias_catnews_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE cat_noticias_catnews_id_seq OWNED BY cat_noticias.catnews_id;


--
-- Name: categorias; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE categorias (
    id integer NOT NULL,
    categoria character varying(100) NOT NULL
);


ALTER TABLE public.categorias OWNER TO postgres;

--
-- Name: categorias_cat_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE categorias_cat_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.categorias_cat_id_seq OWNER TO postgres;

--
-- Name: categorias_cat_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE categorias_cat_id_seq OWNED BY categorias.id;


--
-- Name: categorias_noticias; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE categorias_noticias (
    cat_id integer NOT NULL,
    not_id integer NOT NULL
);


ALTER TABLE public.categorias_noticias OWNER TO postgres;

--
-- Name: cursos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cursos (
    id_curso integer NOT NULL,
    nome text NOT NULL,
    texto text NOT NULL,
    logo text
);


ALTER TABLE public.cursos OWNER TO postgres;

--
-- Name: cursos_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cursos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cursos_id_seq OWNER TO postgres;

--
-- Name: cursos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE cursos_id_seq OWNED BY cursos.id_curso;


--
-- Name: dia; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE dia (
    id_dia integer NOT NULL,
    dia character varying(100) NOT NULL
);


ALTER TABLE public.dia OWNER TO postgres;

--
-- Name: dia_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE dia_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.dia_id_seq OWNER TO postgres;

--
-- Name: dia_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE dia_id_seq OWNED BY dia.id_dia;


--
-- Name: disciplinas; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE disciplinas (
    id_disc integer NOT NULL,
    disciplina text NOT NULL,
    curso integer NOT NULL
);


ALTER TABLE public.disciplinas OWNER TO postgres;

--
-- Name: disciplinas_disciplina_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE disciplinas_disciplina_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.disciplinas_disciplina_seq OWNER TO postgres;

--
-- Name: disciplinas_disciplina_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE disciplinas_disciplina_seq OWNED BY disciplinas.disciplina;


--
-- Name: disciplinas_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE disciplinas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.disciplinas_id_seq OWNER TO postgres;

--
-- Name: disciplinas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE disciplinas_id_seq OWNED BY disciplinas.id_disc;


--
-- Name: estagios; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE estagios (
    id_est integer NOT NULL,
    titulo character varying(200) NOT NULL,
    texto text NOT NULL,
    categoria integer NOT NULL,
    datas date DEFAULT now() NOT NULL
);


ALTER TABLE public.estagios OWNER TO postgres;

--
-- Name: estagios_id_est_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE estagios_id_est_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.estagios_id_est_seq OWNER TO postgres;

--
-- Name: estagios_id_est_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE estagios_id_est_seq OWNED BY estagios.id_est;


--
-- Name: eventos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE eventos (
    id_event integer NOT NULL,
    evento character varying(300) NOT NULL,
    event_cat integer NOT NULL,
    texto text NOT NULL,
    imagem text
);


ALTER TABLE public.eventos OWNER TO postgres;

--
-- Name: eventos_id_event_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE eventos_id_event_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.eventos_id_event_seq OWNER TO postgres;

--
-- Name: eventos_id_event_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE eventos_id_event_seq OWNED BY eventos.id_event;


--
-- Name: imagens_noticias; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE imagens_noticias (
    id_im integer NOT NULL,
    imagem text NOT NULL,
    noticia integer NOT NULL
);


ALTER TABLE public.imagens_noticias OWNER TO postgres;

--
-- Name: imagens_noticias_id_im_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE imagens_noticias_id_im_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.imagens_noticias_id_im_seq OWNER TO postgres;

--
-- Name: imagens_noticias_id_im_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE imagens_noticias_id_im_seq OWNED BY imagens_noticias.id_im;


--
-- Name: local; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE local (
    id integer NOT NULL,
    sala character varying(150) NOT NULL
);


ALTER TABLE public.local OWNER TO postgres;

--
-- Name: local_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE local_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.local_id_seq OWNER TO postgres;

--
-- Name: local_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE local_id_seq OWNED BY local.id;


--
-- Name: monitorias; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE monitorias (
    id_monit integer NOT NULL,
    curso_m integer NOT NULL,
    semestre_m integer NOT NULL,
    sala_m integer NOT NULL,
    disciplina_m integer NOT NULL,
    info_m text NOT NULL
);


ALTER TABLE public.monitorias OWNER TO postgres;

--
-- Name: monitorias_id_monit_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE monitorias_id_monit_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.monitorias_id_monit_seq OWNER TO postgres;

--
-- Name: monitorias_id_monit_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE monitorias_id_monit_seq OWNED BY monitorias.id_monit;


--
-- Name: noticias; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE noticias (
    id_not integer NOT NULL,
    titulo character varying(200) NOT NULL,
    resumo character varying(350) NOT NULL,
    texto text NOT NULL,
    data timestamp without time zone DEFAULT now() NOT NULL,
    autor integer NOT NULL,
    status integer NOT NULL
);


ALTER TABLE public.noticias OWNER TO postgres;

--
-- Name: noticias_id_not_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE noticias_id_not_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.noticias_id_not_seq OWNER TO postgres;

--
-- Name: noticias_id_not_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE noticias_id_not_seq OWNED BY noticias.id_not;


--
-- Name: programacao; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE programacao (
    id_prog integer NOT NULL,
    evento integer NOT NULL,
    texto text NOT NULL,
    data date NOT NULL
);


ALTER TABLE public.programacao OWNER TO postgres;

--
-- Name: programacao_id_prog_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE programacao_id_prog_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.programacao_id_prog_seq OWNER TO postgres;

--
-- Name: programacao_id_prog_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE programacao_id_prog_seq OWNED BY programacao.id_prog;


--
-- Name: semestre; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE semestre (
    id_sem integer NOT NULL,
    semestre text NOT NULL
);


ALTER TABLE public.semestre OWNER TO postgres;

--
-- Name: semestre_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE semestre_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.semestre_id_seq OWNER TO postgres;

--
-- Name: semestre_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE semestre_id_seq OWNED BY semestre.id_sem;


--
-- Name: setores; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE setores (
    id_set integer NOT NULL,
    setor character varying(75) NOT NULL,
    texto text NOT NULL
);


ALTER TABLE public.setores OWNER TO postgres;

--
-- Name: setores_id_set_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE setores_id_set_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.setores_id_set_seq OWNER TO postgres;

--
-- Name: setores_id_set_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE setores_id_set_seq OWNED BY setores.id_set;


--
-- Name: status; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE status (
    id_sta integer NOT NULL,
    status text NOT NULL
);


ALTER TABLE public.status OWNER TO postgres;

--
-- Name: status_id_sta_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE status_id_sta_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.status_id_sta_seq OWNER TO postgres;

--
-- Name: status_id_sta_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE status_id_sta_seq OWNED BY status.id_sta;


--
-- Name: usertype; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE usertype (
    id integer NOT NULL,
    type text NOT NULL
);


ALTER TABLE public.usertype OWNER TO postgres;

--
-- Name: usertype_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE usertype_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usertype_id_seq OWNER TO postgres;

--
-- Name: usertype_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE usertype_id_seq OWNED BY usertype.id;


--
-- Name: usuarios; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE usuarios (
    id integer NOT NULL,
    nome text,
    email text,
    senha text,
    usertype integer
);


ALTER TABLE public.usuarios OWNER TO postgres;

--
-- Name: usuarios_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE usuarios_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuarios_id_seq OWNER TO postgres;

--
-- Name: usuarios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE usuarios_id_seq OWNED BY usuarios.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY alimentos ALTER COLUMN id SET DEFAULT nextval('alimentos_id_seq'::regclass);


--
-- Name: id_assist; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY assistencias ALTER COLUMN id_assist SET DEFAULT nextval('assistencias_id_assist_seq'::regclass);


--
-- Name: id_card; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cardapios ALTER COLUMN id_card SET DEFAULT nextval('cardapios_id_seq'::regclass);


--
-- Name: catnews_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cat_noticias ALTER COLUMN catnews_id SET DEFAULT nextval('cat_noticias_catnews_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY categorias ALTER COLUMN id SET DEFAULT nextval('categorias_cat_id_seq'::regclass);


--
-- Name: id_curso; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cursos ALTER COLUMN id_curso SET DEFAULT nextval('cursos_id_seq'::regclass);


--
-- Name: id_dia; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY dia ALTER COLUMN id_dia SET DEFAULT nextval('dia_id_seq'::regclass);


--
-- Name: id_disc; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY disciplinas ALTER COLUMN id_disc SET DEFAULT nextval('disciplinas_id_seq'::regclass);


--
-- Name: id_est; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY estagios ALTER COLUMN id_est SET DEFAULT nextval('estagios_id_est_seq'::regclass);


--
-- Name: id_event; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY eventos ALTER COLUMN id_event SET DEFAULT nextval('eventos_id_event_seq'::regclass);


--
-- Name: id_im; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY imagens_noticias ALTER COLUMN id_im SET DEFAULT nextval('imagens_noticias_id_im_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY local ALTER COLUMN id SET DEFAULT nextval('local_id_seq'::regclass);


--
-- Name: id_monit; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY monitorias ALTER COLUMN id_monit SET DEFAULT nextval('monitorias_id_monit_seq'::regclass);


--
-- Name: id_not; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY noticias ALTER COLUMN id_not SET DEFAULT nextval('noticias_id_not_seq'::regclass);


--
-- Name: id_prog; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY programacao ALTER COLUMN id_prog SET DEFAULT nextval('programacao_id_prog_seq'::regclass);


--
-- Name: id_sem; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY semestre ALTER COLUMN id_sem SET DEFAULT nextval('semestre_id_seq'::regclass);


--
-- Name: id_set; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY setores ALTER COLUMN id_set SET DEFAULT nextval('setores_id_set_seq'::regclass);


--
-- Name: id_sta; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY status ALTER COLUMN id_sta SET DEFAULT nextval('status_id_sta_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY usertype ALTER COLUMN id SET DEFAULT nextval('usertype_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY usuarios ALTER COLUMN id SET DEFAULT nextval('usuarios_id_seq'::regclass);


--
-- Data for Name: alimentos; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO alimentos VALUES (2, 'Feijão');
INSERT INTO alimentos VALUES (4, 'Batata');
INSERT INTO alimentos VALUES (5, 'Lasanha');
INSERT INTO alimentos VALUES (6, 'Tomate');
INSERT INTO alimentos VALUES (8, 'Arroz');
INSERT INTO alimentos VALUES (9, 'Massa');


--
-- Data for Name: alimentos_cardapios; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO alimentos_cardapios VALUES (16, 2);
INSERT INTO alimentos_cardapios VALUES (16, 4);
INSERT INTO alimentos_cardapios VALUES (18, 2);
INSERT INTO alimentos_cardapios VALUES (18, 6);
INSERT INTO alimentos_cardapios VALUES (19, 2);
INSERT INTO alimentos_cardapios VALUES (20, 2);
INSERT INTO alimentos_cardapios VALUES (20, 8);
INSERT INTO alimentos_cardapios VALUES (23, 2);
INSERT INTO alimentos_cardapios VALUES (23, 6);
INSERT INTO alimentos_cardapios VALUES (23, 8);
INSERT INTO alimentos_cardapios VALUES (23, 4);


--
-- Name: alimentos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('alimentos_id_seq', 10, true);


--
-- Data for Name: assistencias; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO assistencias VALUES (3, 'Auxílio-alimentação', 'Propicia condições para o atendimento das necessidades de alimentação básica dos estudantes, através do fornecimento de bolsas ou de refeições em restaurantes próprios, terceirizados e/u conveniados.');


--
-- Name: assistencias_id_assist_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('assistencias_id_assist_seq', 3, true);


--
-- Data for Name: cardapios; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO cardapios VALUES (16, 2, '2015-11-10');
INSERT INTO cardapios VALUES (18, 5, '2015-11-16');
INSERT INTO cardapios VALUES (19, 1, '2015-11-25');
INSERT INTO cardapios VALUES (20, 1, '2015-12-09');
INSERT INTO cardapios VALUES (23, 1, '2015-12-16');


--
-- Name: cardapios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cardapios_id_seq', 23, true);


--
-- Data for Name: cat_noticias; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: cat_noticias_catnews_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cat_noticias_catnews_id_seq', 1, false);


--
-- Data for Name: categorias; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO categorias VALUES (1, 'Superior');
INSERT INTO categorias VALUES (2, 'Assistência Estudantil');
INSERT INTO categorias VALUES (6, 'Processo Seletivo');
INSERT INTO categorias VALUES (7, 'Pós-Graduação');
INSERT INTO categorias VALUES (8, 'Evento');
INSERT INTO categorias VALUES (9, 'Semana Acadêmica');
INSERT INTO categorias VALUES (10, 'Eletrônica');


--
-- Name: categorias_cat_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('categorias_cat_id_seq', 10, true);


--
-- Data for Name: categorias_noticias; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO categorias_noticias VALUES (7, 1);
INSERT INTO categorias_noticias VALUES (8, 1);
INSERT INTO categorias_noticias VALUES (8, 2);
INSERT INTO categorias_noticias VALUES (9, 2);
INSERT INTO categorias_noticias VALUES (10, 2);
INSERT INTO categorias_noticias VALUES (1, 28);
INSERT INTO categorias_noticias VALUES (2, 28);
INSERT INTO categorias_noticias VALUES (2, 29);


--
-- Data for Name: cursos; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO cursos VALUES (1, 'Curso Superior de Tecnologia em Sistemas para Internet', 'MODALIDADE: Presencial

HABILITAÇÃO: Tecnologia

CARGA HORÁRIAa: 2.310 horas

ESTÁGIO: TCC

PERFIL: O egresso do Curso Superior de Tecnologia em Desenvolvimento de Sistemas para Internet deverá ter uma formação ética, técnica, criativa e humanística, que possibilite, ao futuro profissional, ser um cidadão responsável, empreendedor, investigador e crítico, apto a desempenhar sua profissão, interagindo em uma sociedade plena de transformações, no que concerne ao desenvolvimento de sistemas de informação para a internet e às tecnologias associadas a estes processos. O enfoque do curso proposto é voltado para web, em que serão trabalhadas competências relacionadas às áreas de programação, a banco de dados e a redes de computadores.

CAMPO DE ATUAÇÃO: Os futuros egressos do curso estarão aptos para assumir os seguintes postos identificáveis no mercado de trabalho local e regional: administrador de banco de dados; administrador de redes; administrador de sistema operacional; analista de aplicações web; analista de desenvolvimento de sistemas; analista de sistemas; analista de suporte; analista de ti; consultor de informática; consultor de sistemas; desenvolvedor de sistemas; desenvolvedor web; programador de computador; programador web; web designer.', 'nulo');
INSERT INTO cursos VALUES (3, 'Curso Técnico em Eletromecânica', 'FORMA: Concomitante

MODALIDADE: Regular

CARGA HORÁRIA: horária: 1.500 horas

ESTÁGIO: 300 horas

PERFIL: O Técnico em Eletromecânica é o profissional de grau médio legalmente habilitado para atuar junto à área industrial, principalmente no segmento de manutenção de sistemas automatizados ou não, além de atuar na instalação e operação de processos industriais e produção de bens manufaturados.

CAMPO DE ATUAÇÃO: Trabalha na manutenção corretiva, preventiva e preditiva, envolvendo máquinas e equipamentos como bombas, injetoras de plástico, máquinas-ferramentas, prensas, sistemas automáticos com controladores programáveis, inversores de frequência, componentes hidráulicos e pneumáticos, instrumentação industrial.  Desenvolve projeto e instalação elétrica de sistemas de comando e controle de motores industriais. Pode exercer atividades em diversas empresas, nas quais se faça necessário um profissional especializado nas áreas de manutenção, automação, instalação, operação e projeto.', 'nulo');
INSERT INTO cursos VALUES (2, 'Bacharelado em Design', 'MODALIDADE: Presencial;

HABILITAÇÃO: Design;

CARGA HORÁRIA: 2920 horas divididas em 8 semestres;

ESTÁGIO: Não obrigatório;

PERFIL: O curso de Bacharelado em Design oferece formação superior em Design, possibilitando ao aluno elaborar soluções de projeto no campo bidimensional e tridimensional para problemas de comunicação, informação, interação e uso, concernentes a diversos artefatos mediadores de ações e relações humanas, visando desenvolver a capacidade analítica, crítica e expressiva, integrada à realidade contemporânea. A estrutura do curso possui um currículo flexível, baseado nas novas diretrizes curriculares nacionais para bacharelados em design, no qual o aluno possa construir seu caminho e focar sua especialidade conforme seus interesses e aptidões. Isso possibilita que o aluno adquira conhecimentos mais abrangentes, podendo flexibilizar sua atuação em um número maior de áreas disponibilizadas pelo mercado atual. Assim sendo, o perfil profissional do Bacharel em Design será caracterizado pela capacidade de desenvolver projetos voltados tanto à mídia impressa e digital como também à comunicação em conformação tridimensional (produtos) e suas relações com o espaço em que se inserem (ambiente). Os projetos a serem desenvolvidos por esse profissional devem ter o foco na interdisciplinaridade, considerando as necessidades humanas e seu contexto sócio-econômico-cultural. O Bacharel em Design deverá atingir uma postura profissional com visão crítica e humanista, desenvolver capacidade de utilização de tecnologias, atentar às questões da sustentabilidade e desempenhar atividades de caráter criativo, técnico e científico, agregando valor e diferencial aos projetos desenvolvidos.

CAMPO DE ATUAÇÃO:  Atuação de vários tipos de projeto, quer impressos, digitais ou tridimensionais, resultando em produtos e sistemas visuais de comunicação, onde destacam-se: marcas e identidade corporativa, sinalização de ambientes internos e urbanos, editoração de publicações, embalagens, webdesign, ilustração, interfaces digitais e produções multimídias, ambientação de exposições, mobiliário e artefatos utilitários, entre outros. O Bacharel em Design pode, assim, atuar em diversos segmentos que pesquisam, desenvolvem e solucionam questões próprias da área, como escritórios de design, editoras, agências de publicidade e propaganda, agências de mídias digitais, setores de marketing e design, setores de design de interiores, atividades autônomas e instituições públicas e privadas. O designer pode ainda desenvolver a sua atividade no âmbito da pesquisa, investigação e consultoria. Além desses campos, os egressos podem optar também pela continuação dos estudos em cursos de pós-graduação, visando atuar em Instituições de Ensino Superior.', 'nulo');
INSERT INTO cursos VALUES (4, 'Curso Técnico em Edificações', 'FORMA: Integrada ou Subsequente

MODALIDADE: Regular

CARGA HORÁRIA: 3.360 horas (Integrada) ou 1.875 horas (Subsequente)

ESTÁGIO: 300 horas

PERFIL: O Curso Técnico em Edificações através da conexão entre o planejamento, a execução, o conhecimento teórico e a prática efetiva relativa às construções civis, forma profissionais qualificados para atuarem em escritórios técnicos e no canteiro de obras, nas áreas de desenho, projetos, orçamentos, ensaios tecnológicos, levantamentos topográficos, elaboração e acompanhamento de cronogramas, fiscalização e controle de qualidade em canteiro e indústrias, dentre outras atividades. Nesse sentido, o Técnico em Edificações elabora e executa projetos de edificações conforme normas técnicas de segurança e atribuições legais. Planeja a execução e elabora orçamento de obras. Presta assistência técnica no estudo e desenvolvimento de projetos e pesquisas tecnológicas na área de edificações. Orienta e coordena a execução de serviços de manutenção de equipamentos e de instalações em edificações. Orienta na assistência técnica para compra, venda e utilização de produtos e equipamentos especializados.

CAMPO DE ATUAÇÃO: Indústrias de construção civil; empresas de projetos; setor de manutenção de todos os tipos de indústrias; profissional liberal ou pequeno empresário (desenho, topografia, instalações domiciliares); estabelecimentos de ensino; prefeituras e outros órgãos governamentais.', 'nulo');


--
-- Name: cursos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cursos_id_seq', 4, true);


--
-- Data for Name: dia; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO dia VALUES (1, 'Segunda-Feira');
INSERT INTO dia VALUES (2, 'Terça-Feira');
INSERT INTO dia VALUES (3, 'Quarta-Feira');
INSERT INTO dia VALUES (4, 'Quinta-Feira');
INSERT INTO dia VALUES (5, 'Sexta-Feira');


--
-- Name: dia_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('dia_id_seq', 5, true);


--
-- Data for Name: disciplinas; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO disciplinas VALUES (1, 'Lógica de programação', 1);
INSERT INTO disciplinas VALUES (2, 'Maquinas agricolas', 3);
INSERT INTO disciplinas VALUES (3, 'Arquitetura', 2);
INSERT INTO disciplinas VALUES (4, 'Banco de dados Orientado a Objetos', 1);
INSERT INTO disciplinas VALUES (5, 'Instalações elétricas', 4);
INSERT INTO disciplinas VALUES (6, 'Linguagens de Programação para Web', 1);


--
-- Name: disciplinas_disciplina_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('disciplinas_disciplina_seq', 1, false);


--
-- Name: disciplinas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('disciplinas_id_seq', 7, true);


--
-- Data for Name: estagios; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: estagios_id_est_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('estagios_id_est_seq', 1, false);


--
-- Data for Name: eventos; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO eventos VALUES (1, 'asdasd', 2, 'asdasdqweqcvxcvxcvasd', NULL);
INSERT INTO eventos VALUES (2, 'asdasd', 2, 'asdasdqweqcvxcvxcvasd', NULL);
INSERT INTO eventos VALUES (3, 'OP', 1, 'asdasd', NULL);
INSERT INTO eventos VALUES (4, 'OPasd', 2, 'asdasdasdqweasda', 'files/_5677_2015-07-23_00001.jpg');
INSERT INTO eventos VALUES (5, 'OP', 7, 'asdasdqwevbfdgfgdfg', 'files/_439_319.jpg');
INSERT INTO eventos VALUES (6, 'Neymar', 10, 'Messi', 'files/_5062_11931754_990352044387688_895448388_n.jpg');


--
-- Name: eventos_id_event_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('eventos_id_event_seq', 6, true);


--
-- Data for Name: imagens_noticias; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO imagens_noticias VALUES (1, 'files/_3858_443b883e839ba3fbee3be6a75ee70bd0.jpg', 1);
INSERT INTO imagens_noticias VALUES (2, 'files/_5166_DGmwjBk.jpg', 1);
INSERT INTO imagens_noticias VALUES (7, 'files/_8038_uSrdhMe.png', 28);
INSERT INTO imagens_noticias VALUES (8, 'files/_2400_Steam-Logo.png', 29);


--
-- Name: imagens_noticias_id_im_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('imagens_noticias_id_im_seq', 8, true);


--
-- Data for Name: local; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO local VALUES (3, 'Lab-5 (319-a)');
INSERT INTO local VALUES (4, 'Lab-4 (149-b)');


--
-- Name: local_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('local_id_seq', 5, true);


--
-- Data for Name: monitorias; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO monitorias VALUES (2, 2, 3, 4, 3, 'Pallete desing');
INSERT INTO monitorias VALUES (1, 1, 4, 3, 4, 'Estagiário Alex
As terças-feiras as 15h');
INSERT INTO monitorias VALUES (5, 1, 2, 3, 6, 'Monitorias de Segunda a Quinta-feira

Segundas e terças-feiras das 14h às 17h30;
Quarta-feira das 8h30 às 11h;
Quinta-feira das 18h às 20h.

Com o bolsista Mercer.');


--
-- Name: monitorias_id_monit_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('monitorias_id_monit_seq', 5, true);


--
-- Data for Name: noticias; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO noticias VALUES (1, 'Confira gabaritos do Vestibular de Verão 2016 ', 'Os gabaritos das provas  do vestibular de Verão/2016,  realizadas nesse domingo (20), para ingresso em cursos técnicos, estão disponíveis para conferência. Para verificar, acesse o site do processo seletivo. ', 'Trabalhos desenvolvidos por pesquisadores, no âmbito da pós-graduação, serão apresentados na 2ª Jornada de Pós-Graduação do IFSul, que ocorrerá nesta sexta (18), no campus Pelotas.

O evento terá ainda a palestra da professora doutora Maria Isabel da Cunha, titular da Universidade do Vale do Rio dos Sinos e colaboradora no Programa de Pós-graduação em Educação da UFPel e do professor doutor Carlos Machado, coordenador do Programa de Pós-Graduação em Educação Ambiental da Fundação Universidade Federal do Rio Grande (Furg).

 A jornada foi organizada pela Diretoria de Pesquisa e Extensão do Campus Pelotas, pelo Departamento de Pesquisa, Extensão e Pós-Graduação do Campus Pelotas – Visconde da Graça e pela Pró-Reitoria de Pesquisa, Inovação e Pós-Graduação (Propesp). Os organizadores solicitam aos participantes que apresentarão seus pôsteres, que atentem para o horário de colocação e exposição dos mesmos.

Os trabalhos serão apresentados em formato de pôster. Para ouvintes, as inscrições ocorrerão no dia do evento, das 8h30min às 9h30min.

Mais informações podem ser obtidas no site do evento.

PROGRAMAÇÃO

08h30 às 9h30 – Credenciamento e colocação de pôsteres (Auditório Enilda Feistauer / Saguão do Campus Pelotas)

9h30 às 10h – Cerimônia de Abertura (Auditório Enilda Feistauer)

10h às 12h – Palestra de Abertura: "Desafios contemporâneos para a educação: implicações na docência e na prática pedagógica", com a Prof.ª Dr.ª Maria Isabel da Cunha, professora titular da Universidade do Vale do Rio dos Sinos e colaboradora no PPGEducação da UFPel

12h às 14h – Intervalo para almoço

14h às 15h45min – Apresentação de pôster (Saguão do Campus Pelotas)

15h45min às 16h – Coffee break

16h às 18h – Palestra de encerramento: "A Educação para a justiça Ambiental: pesquisas e conflitos sócio-ambientais no extremo sul do Brasil e este do Uruguai", com o Prof. Dr. Carlos RS Machado, coordenador do Programa de Pós-Graduação em Educação Ambiental da FURG (Auditório principal)', '2015-12-21 16:35:44.675', 2, 1);
INSERT INTO noticias VALUES (2, 'Eletrônica do campus Pelotas realiza Semana Acadêmica', 'Durante o evento também está sendo realizada uma campanha para garantir a crianças que pertencem a famílias de baixa renda o direito de ganhar presentes neste Natal', ' Está sendo realizada até a próxima sexta-feira (11), a Semana Acadêmica da Eletrônica - 2015. Este ano, o evento conta com diversas atividades em diferentes segmentos. São palestras, minicursos, visitas técnicas e um trabalho social que vem unindo ainda mais os participantes.

Entre os Muros da Escola, Computação Quântica, Inovações tecnológicas e os Desafios do Profissional da Eletrônica são alguns dos temas abordados nas palestras. Durante essa semana, também está em destaque o mercado de trabalho, com a promoção de uma conversa sobre entrevista de emprego e montagem de currículo. Entre os minicursos, as atividades prometem agregar conhecimento técnico e prático aos estudos de eletrônica. Além disso, estão sendo realizadas visitas técnicas a empresas.

Os alunos do curso também estão desenvolvendo a campanha Criança Feliz, com o objetivo de arrecadar presentes para crianças que pertençam a famílias em situação de vulnerabilidade social.

A coleta está sendo feita durante toda a semana. Os brinquedos podem ser novos ou usados, o que importa, de acordo com os organizadores, é a doação e a união não só entre os participantes do evento, mas de toda a comunidade acadêmica. As doações serão entregues pelo Papai Noel uma semana antes do Natal.

Os alunos de eletrônica convidam todos a ajudarem essa causa', '2015-12-21 16:49:58.501', 2, 1);
INSERT INTO noticias VALUES (28, 'Saitama', 'asdasdasdasd', 'asdasdasdasdasdasd45a6sd54a6s5d46as4d65', '2016-01-28 16:22:00.267', 2, 1);
INSERT INTO noticias VALUES (29, 'po', 'asd', 'asdasdasd', '2016-01-28 19:06:41.993', 2, 1);


--
-- Name: noticias_id_not_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('noticias_id_not_seq', 29, true);


--
-- Data for Name: programacao; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: programacao_id_prog_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('programacao_id_prog_seq', 1, false);


--
-- Data for Name: semestre; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO semestre VALUES (1, '1º Semestre');
INSERT INTO semestre VALUES (2, '2º Semestre');
INSERT INTO semestre VALUES (3, '3º Semestre');
INSERT INTO semestre VALUES (4, '4º Semestre');
INSERT INTO semestre VALUES (5, '5º Semestre');
INSERT INTO semestre VALUES (6, '6º Semestre');
INSERT INTO semestre VALUES (7, '7º Semestre');
INSERT INTO semestre VALUES (8, '8º Semestre');
INSERT INTO semestre VALUES (9, '9º Semestre');
INSERT INTO semestre VALUES (10, '10º Semestre');
INSERT INTO semestre VALUES (11, '11º Semestre');
INSERT INTO semestre VALUES (12, '12º Semestre');


--
-- Name: semestre_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('semestre_id_seq', 12, true);


--
-- Data for Name: setores; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO setores VALUES (1, 'COAE', 'Coordenadoria de Assistência Estudantil

Telefone: xxxxxxxx');
INSERT INTO setores VALUES (2, 'PROPESP', 'Pró Reitoria de Pesquisa

Telefone: xxxxxxxx');


--
-- Name: setores_id_set_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('setores_id_set_seq', 3, true);


--
-- Data for Name: status; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO status VALUES (1, 'Sob Avaliação!');
INSERT INTO status VALUES (2, 'Rejeitado!');
INSERT INTO status VALUES (3, 'Editado!');
INSERT INTO status VALUES (4, 'Publicado!');
INSERT INTO status VALUES (5, 'Publicado e editado!');


--
-- Name: status_id_sta_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('status_id_sta_seq', 5, true);


--
-- Data for Name: usertype; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO usertype VALUES (1, 'Administrador');
INSERT INTO usertype VALUES (2, 'Editor');
INSERT INTO usertype VALUES (3, 'Autor');


--
-- Name: usertype_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('usertype_id_seq', 3, true);


--
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO usuarios VALUES (1, 'nome', 'toboco@oi.comk', 'd0302fc5147d39ec8db3eb006b8aea9dc86ba124', 3);
INSERT INTO usuarios VALUES (2, 'Mercer', 'mercer@mail.com', 'd0302fc5147d39ec8db3eb006b8aea9dc86ba124', 1);


--
-- Name: usuarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('usuarios_id_seq', 2, true);


--
-- Name: alimentos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY alimentos
    ADD CONSTRAINT alimentos_pkey PRIMARY KEY (id);


--
-- Name: assistencias_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY assistencias
    ADD CONSTRAINT assistencias_pkey PRIMARY KEY (id_assist);


--
-- Name: cardapios_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cardapios
    ADD CONSTRAINT cardapios_pkey PRIMARY KEY (id_card);


--
-- Name: cat_noticias_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cat_noticias
    ADD CONSTRAINT cat_noticias_pkey PRIMARY KEY (catnews_id);


--
-- Name: categorias_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY categorias
    ADD CONSTRAINT categorias_pkey PRIMARY KEY (id);


--
-- Name: cursos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cursos
    ADD CONSTRAINT cursos_pkey PRIMARY KEY (id_curso);


--
-- Name: dia_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY dia
    ADD CONSTRAINT dia_pkey PRIMARY KEY (id_dia);


--
-- Name: disciplinas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY disciplinas
    ADD CONSTRAINT disciplinas_pkey PRIMARY KEY (id_disc);


--
-- Name: estagios_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY estagios
    ADD CONSTRAINT estagios_pkey PRIMARY KEY (id_est);


--
-- Name: eventos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY eventos
    ADD CONSTRAINT eventos_pkey PRIMARY KEY (id_event);


--
-- Name: imagens_noticias_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY imagens_noticias
    ADD CONSTRAINT imagens_noticias_pkey PRIMARY KEY (id_im);


--
-- Name: local_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY local
    ADD CONSTRAINT local_pkey PRIMARY KEY (id);


--
-- Name: monitorias_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY monitorias
    ADD CONSTRAINT monitorias_pkey PRIMARY KEY (id_monit);


--
-- Name: noticias_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY noticias
    ADD CONSTRAINT noticias_pkey PRIMARY KEY (id_not);


--
-- Name: programacao_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY programacao
    ADD CONSTRAINT programacao_pkey PRIMARY KEY (id_prog);


--
-- Name: semestre_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY semestre
    ADD CONSTRAINT semestre_pkey PRIMARY KEY (id_sem);


--
-- Name: setores_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY setores
    ADD CONSTRAINT setores_pkey PRIMARY KEY (id_set);


--
-- Name: status_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY status
    ADD CONSTRAINT status_pkey PRIMARY KEY (id_sta);


--
-- Name: usertype_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY usertype
    ADD CONSTRAINT usertype_pkey PRIMARY KEY (id);


--
-- Name: usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id);


--
-- Name: alimentos_cardapios_id_ali_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY alimentos_cardapios
    ADD CONSTRAINT alimentos_cardapios_id_ali_fkey FOREIGN KEY (id_ali) REFERENCES alimentos(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: alimentos_cardapios_id_card_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY alimentos_cardapios
    ADD CONSTRAINT alimentos_cardapios_id_card_fkey FOREIGN KEY (id_cad) REFERENCES cardapios(id_card) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: cardapios_dia_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cardapios
    ADD CONSTRAINT cardapios_dia_fkey FOREIGN KEY (dia) REFERENCES dia(id_dia) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: categorias_noticias_cat_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY categorias_noticias
    ADD CONSTRAINT categorias_noticias_cat_id_fkey FOREIGN KEY (cat_id) REFERENCES categorias(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: categorias_noticias_not_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY categorias_noticias
    ADD CONSTRAINT categorias_noticias_not_id_fkey FOREIGN KEY (not_id) REFERENCES noticias(id_not) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: disciplinas_curso_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY disciplinas
    ADD CONSTRAINT disciplinas_curso_fkey FOREIGN KEY (curso) REFERENCES cursos(id_curso) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: estagios_categoria_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY estagios
    ADD CONSTRAINT estagios_categoria_fkey FOREIGN KEY (categoria) REFERENCES categorias(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: eventos_event_cat_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY eventos
    ADD CONSTRAINT eventos_event_cat_fkey FOREIGN KEY (event_cat) REFERENCES categorias(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: imagens_noticias_noticia_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY imagens_noticias
    ADD CONSTRAINT imagens_noticias_noticia_fkey FOREIGN KEY (noticia) REFERENCES noticias(id_not) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: monitorias_curso_m_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY monitorias
    ADD CONSTRAINT monitorias_curso_m_fkey FOREIGN KEY (curso_m) REFERENCES cursos(id_curso) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: monitorias_disciplina_m_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY monitorias
    ADD CONSTRAINT monitorias_disciplina_m_fkey FOREIGN KEY (disciplina_m) REFERENCES disciplinas(id_disc) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: monitorias_sala_m_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY monitorias
    ADD CONSTRAINT monitorias_sala_m_fkey FOREIGN KEY (sala_m) REFERENCES local(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: monitorias_semestre_m_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY monitorias
    ADD CONSTRAINT monitorias_semestre_m_fkey FOREIGN KEY (semestre_m) REFERENCES semestre(id_sem) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: noticias_autor_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY noticias
    ADD CONSTRAINT noticias_autor_fkey FOREIGN KEY (autor) REFERENCES usuarios(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: noticias_status_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY noticias
    ADD CONSTRAINT noticias_status_fkey FOREIGN KEY (status) REFERENCES status(id_sta) ON UPDATE CASCADE ON DELETE CASCADE;


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

