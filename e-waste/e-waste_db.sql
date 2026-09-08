--
-- PostgreSQL database dump
--

\restrict pK1KrgabWk83bXUAyVoHL1gtucfxeje9djhn4hm9GgLCDse2RrfZCtuXpDA6Cr1

-- Dumped from database version 18.6 (Ubuntu 18.6-1.pgdg26.04+2)
-- Dumped by pg_dump version 18.6 (Ubuntu 18.6-1.pgdg26.04+2)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: invoice; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.invoice (
    invoice_id integer NOT NULL,
    waste_id integer NOT NULL,
    status character varying(150) DEFAULT 'pending'::character varying
);


ALTER TABLE public.invoice OWNER TO postgres;

--
-- Name: invoice_invoice_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.invoice_invoice_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.invoice_invoice_id_seq OWNER TO postgres;

--
-- Name: invoice_invoice_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.invoice_invoice_id_seq OWNED BY public.invoice.invoice_id;


--
-- Name: receipt; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.receipt (
    receipt_id integer NOT NULL,
    issued_date timestamp without time zone CONSTRAINT receipt_date_not_null NOT NULL,
    waste_id integer NOT NULL,
    amount numeric(12,2)
);


ALTER TABLE public.receipt OWNER TO postgres;

--
-- Name: receipt_receipt_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.receipt_receipt_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.receipt_receipt_id_seq OWNER TO postgres;

--
-- Name: receipt_receipt_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.receipt_receipt_id_seq OWNED BY public.receipt.receipt_id;


--
-- Name: roles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.roles (
    role_id integer NOT NULL,
    role_name character varying(200) NOT NULL
);


ALTER TABLE public.roles OWNER TO postgres;

--
-- Name: roles_role_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.roles_role_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.roles_role_id_seq OWNER TO postgres;

--
-- Name: roles_role_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.roles_role_id_seq OWNED BY public.roles.role_id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    user_id integer NOT NULL,
    phone_no bigint NOT NULL,
    account_no bigint,
    user_location character varying(100) CONSTRAINT users_location_not_null NOT NULL,
    username character varying(250) NOT NULL,
    passwords character varying(100),
    role_id integer,
    staff_email character varying(250),
    email character varying(250)
);


ALTER TABLE public.users OWNER TO postgres;

--
-- Name: users_user_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_user_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.users_user_id_seq OWNER TO postgres;

--
-- Name: users_user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_user_id_seq OWNED BY public.users.user_id;


--
-- Name: waste; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.waste (
    waste_id integer NOT NULL,
    user_id integer,
    waste_condition character varying(100),
    estimated_weight numeric(10,2),
    actual_weight numeric(10,2),
    waste_status character varying(100) DEFAULT 'pending'::character varying,
    track_no character varying(50),
    tech_id integer,
    submision_date date DEFAULT CURRENT_DATE,
    waste_type character varying(100)[]
);


ALTER TABLE public.waste OWNER TO postgres;

--
-- Name: waste_waste_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.waste_waste_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.waste_waste_id_seq OWNER TO postgres;

--
-- Name: waste_waste_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.waste_waste_id_seq OWNED BY public.waste.waste_id;


--
-- Name: invoice invoice_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.invoice ALTER COLUMN invoice_id SET DEFAULT nextval('public.invoice_invoice_id_seq'::regclass);


--
-- Name: receipt receipt_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.receipt ALTER COLUMN receipt_id SET DEFAULT nextval('public.receipt_receipt_id_seq'::regclass);


--
-- Name: roles role_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.roles ALTER COLUMN role_id SET DEFAULT nextval('public.roles_role_id_seq'::regclass);


--
-- Name: users user_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN user_id SET DEFAULT nextval('public.users_user_id_seq'::regclass);


--
-- Name: waste waste_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.waste ALTER COLUMN waste_id SET DEFAULT nextval('public.waste_waste_id_seq'::regclass);


--
-- Data for Name: invoice; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.invoice (invoice_id, waste_id, status) FROM stdin;
\.


--
-- Data for Name: receipt; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.receipt (receipt_id, issued_date, waste_id, amount) FROM stdin;
10	2026-09-04 11:51:16.106428	78	30000.00
11	2026-09-05 20:08:25.15886	79	59.50
12	2026-09-05 21:43:28.229011	80	7500.00
13	2026-09-05 21:43:34.702092	81	7500.00
15	2026-09-07 18:34:01.442427	82	3000.00
14	2026-09-05 21:43:39.81964	83	3000.00
16	2026-09-07 18:34:42.2838	85	444000.00
17	2026-09-07 18:34:47.409218	87	34500.00
18	2026-09-07 18:34:53.711265	86	90000.00
19	2026-09-07 18:35:02.661703	89	5000.00
20	2026-09-07 18:38:38.153846	90	10500.00
21	2026-09-08 09:40:55.338456	93	7500.00
\.


--
-- Data for Name: roles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.roles (role_id, role_name) FROM stdin;
22	coordinator
23	technician
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (user_id, phone_no, account_no, user_location, username, passwords, role_id, staff_email, email) FROM stdin;
230	255754464189	\N	dodoma	coordinator1	$2y$12$lpl2ABZm03KF1UGyrD7WmO5JY4ow3qjb1lKGnZH.n8OWWP6dXwieO	22	coordinator2@gmail.com	\N
231	255711111111	\N	dar	coordinator2	$2y$12$LyrUF37TrVCAEpOwW2.CDOV8tJcr0McKJId9mBk7v0DuKS/vF0rCa	22	coordinator1@gmail.com	\N
232	255754464186	\N	dodoma posta 24	technician1	$2y$12$KAWX44aujukCCiH4oJQxL./OZjjLxcQqwoFJVQu7nbg9g8gi45WLu	23	technician1@gmail.com	\N
233	255754464180	\N	dodoma	technician2	$2y$12$C.3I84rSU9ItSTmBMDtlbeLQJHXJpU7hkDdrdUnIQPz7A5voSMU6i	23	technician2@gmail.com	\N
238	255622222233	2414343143	dodoma posta 24	citizen1	\N	\N	\N	citizen1@gmail.com
239	255622222233	2414343143	dodoma posta 24	citizen1	\N	\N	\N	citizen1@gmail.com
240	255754464185	34134411431	singida	citizen4	\N	\N	\N	citizen4@gmail.com
241	255754464186	242424	dodoma posta 24	citizen2	\N	\N	\N	citizen2@gmail.com
242	255754444182	43343535	dodoma posta 24	citizen10	\N	\N	\N	citizen10@gmail.com
243	255456789123	243524	dar	citizen5	\N	\N	\N	citizen5@gmail.com
244	255754464189	25526262	03 mwatano st	Antony Donald	\N	\N	\N	www.anthonynjama@gmail.com
245	255987654321	25526262	03 mwatano st	Antony	\N	\N	\N	www.anthonynjama@gmail.com
246	255711111111	6536367636565	mbeya	antony3	\N	\N	\N	antony@gmail.com
247	255724464189	2433444	03 mwatano st	Njama	\N	\N	\N	www.anthonynjama@gmail.com
248	255754464189	25526262	03 mwatano st	Antony Donald	\N	\N	\N	antonynjama2004@gmail.com
249	255754464189	25526262	03 mwatano st	Antony Donald	\N	\N	\N	antonynjama2004@gmail.com
250	255754464189	25526262	03 mwatano st	Antony Donald	\N	\N	\N	antonynjama2004@gmail.com
251	255754464189	25526262	03 mwatano st	Antony	\N	\N	\N	antonynjama2004@gmail.com
252	255754464189	25526262	03 mwatano st	Antony	\N	\N	\N	antonynjama2004@gmail.com
253	255654464189	25526262	03 mwatano st	Antony Donald	\N	\N	\N	www.anthonynjama@gmail.com
254	255712352132	2346474848494	Dodom	Zuhur	\N	\N	\N	kulwamwajuma1@gmail.com
255	255123526479	152126788263	Dodom	Zuhura	\N	\N	\N	zuhur@gmail.com
256	255123526479	152126788263	Dodom	Zuhura	\N	\N	\N	zuhur@gmail.com
257	255686896199	\N	mbuga	ANDREA KIYANGA	$2y$12$Fz8PVTAUoP8H4NzzHAg4VeolxeKr66ri5JyXClx4.WcYx6Og/5SX2	22	andreakiyanga276@gmail.com	\N
258	255686896199	\N	mbuga	ANDREA KIYANGA	$2y$12$HlZ4yVEvZolK4oCmDrxfLuejtv2C.0LLhYOYHUwroZ.V9wzWhLYzm	23	andreakiyanga76@gmail.com	\N
259	255686896199	123456789000	mbuga	ANDREA KIYANGA	\N	\N	\N	andreakiyanga76@gmail.com
\.


--
-- Data for Name: waste; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.waste (waste_id, user_id, waste_condition, estimated_weight, actual_weight, waste_status, track_no, tech_id, submision_date, waste_type) FROM stdin;
81	242	Normal	1.00	5.00	completed	SEW-20260905-6405	232	2026-09-05	{phone}
93	254	Worse	25.00	6.00	completed	SEW-20260908-6392	232	2026-09-08	{computer,phone}
88	249	\N	5.00	\N	assigned	SEW-20260907-4256	233	2026-09-07	{computer,phone}
96	259	\N	-2.00	\N	pending	SEW-20260908-2607	\N	2026-09-08	{computer,phone,peripheral}
92	253	\N	52.00	\N	assigned	SEW-20260907-1581	233	2026-09-07	{others}
78	239	Normal	15.00	20.00	completed	SEW-20260904-4384	232	2026-09-04	{computer,phone,peripheral}
79	240	Very Good	23.00	34.00	completed	SEW-20260905-6816	232	2026-09-05	{computer}
84	245	\N	28.00	\N	assigned	SEW-20260905-2580	233	2026-09-05	{computer,phone,peripheral}
82	243	Normal	45.00	2.00	completed	SEW-20260905-7810	232	2026-09-05	{computer}
83	244	Critical/Worst	21.00	3.00	completed	SEW-20260905-6215	233	2026-09-05	{computer,phone}
80	241	Worse	45.00	6.00	completed	SEW-20260905-3536	232	2026-09-05	{computer,peripheral,appliances}
85	246	Critical/Worst	45.00	444.00	completed	SEW-20260905-3953	232	2026-09-05	{computer}
87	248	Normal	5.00	23.00	completed	SEW-20260907-3177	232	2026-09-07	{computer,phone}
86	247	Excellent	12.00	45.00	completed	SEW-20260905-9487	232	2026-09-05	{computer,phone,peripheral}
89	250	Worse	5.00	4.00	completed	SEW-20260907-2960	232	2026-09-07	{computer,phone}
90	251	Very Good	5.00	6.00	completed	SEW-20260907-5334	233	2026-09-07	{computer,phone}
94	255	\N	2.00	\N	pending	SEW-20260908-6251	\N	2026-09-08	{computer,phone,peripheral}
95	256	\N	2.00	\N	pending	SEW-20260908-4401	\N	2026-09-08	{computer,phone,peripheral}
91	252	Worse	5.00	3.00	assigned	SEW-20260907-8045	232	2026-09-07	{computer,phone}
\.


--
-- Name: invoice_invoice_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.invoice_invoice_id_seq', 1, false);


--
-- Name: receipt_receipt_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.receipt_receipt_id_seq', 21, true);


--
-- Name: roles_role_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.roles_role_id_seq', 23, true);


--
-- Name: users_user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_user_id_seq', 259, true);


--
-- Name: waste_waste_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.waste_waste_id_seq', 96, true);


--
-- Name: invoice invoice_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.invoice
    ADD CONSTRAINT invoice_pkey PRIMARY KEY (invoice_id);


--
-- Name: receipt receipt_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.receipt
    ADD CONSTRAINT receipt_pkey PRIMARY KEY (receipt_id);


--
-- Name: roles roles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (role_id);


--
-- Name: roles roles_role_name_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_role_name_key UNIQUE (role_name);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (user_id);


--
-- Name: users users_staff_email_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_staff_email_key UNIQUE (staff_email);


--
-- Name: waste waste_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.waste
    ADD CONSTRAINT waste_pkey PRIMARY KEY (waste_id);


--
-- Name: waste waste_track_no_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.waste
    ADD CONSTRAINT waste_track_no_key UNIQUE (track_no);


--
-- Name: waste technician; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.waste
    ADD CONSTRAINT technician FOREIGN KEY (tech_id) REFERENCES public.users(user_id);


--
-- Name: users user_role; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT user_role FOREIGN KEY (role_id) REFERENCES public.roles(role_id);


--
-- Name: waste user_waste; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.waste
    ADD CONSTRAINT user_waste FOREIGN KEY (user_id) REFERENCES public.users(user_id);


--
-- Name: invoice waste_invoice; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.invoice
    ADD CONSTRAINT waste_invoice FOREIGN KEY (waste_id) REFERENCES public.waste(waste_id);


--
-- Name: receipt waste_receipt; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.receipt
    ADD CONSTRAINT waste_receipt FOREIGN KEY (waste_id) REFERENCES public.waste(waste_id);


--
-- PostgreSQL database dump complete
--

\unrestrict pK1KrgabWk83bXUAyVoHL1gtucfxeje9djhn4hm9GgLCDse2RrfZCtuXpDA6Cr1

