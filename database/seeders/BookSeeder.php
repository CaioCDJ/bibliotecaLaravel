<?php

namespace Database\Seeders;

use App\Models\Book;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    Book::create([
      'title' => "Linguagem C - Completa e Descomplicada",
      'author' => "André Backes",
      'desc' => "Criada em 1972 nos laboratórios Bell por Dennis Ritchie, a linguagem C se tornou uma das mais bem-sucedidas linguagens de alto nível já criadas, sendo considerada até hoje, na maioria dos cursos de computação do país, a linguagem básica para o aprendizado de disciplinas introdutórias em programação. Com um teor de abstração relativamente elevado, ela está mais próxima da linguagem humana do que o código de máquina. Ainda assim, é considerada por muitos uma linguagem de difícil aprendizado. Com o objetivo de simplificar o ensino da disciplina, André Backes apresenta na 2ª edição de Linguagem C uma nova abordagem que descomplica os conceitos da linguagem por meio de diversos recursos didáticos e ilustrativos, incluindo lembretes e avisos que ressaltam os seus pontos-chave, além de exemplos simples e claros sobre como utilizá-la. Este livro traz um programa de um curso completo de linguagem C, tratando com simplicidade dos assuntos mais complicados até os mais básicos. Um livro essencial para os estudantes e profissionais da área de Computação!",
      'publisher' => "GEN LTC",
      'qtpages' => 448,
      'category' => "linguagens",
      'imgUrl' => "https://m.media-amazon.com/images/P/B07K27L496.01._SCLZZZZZZZ_SX500_.jpg",
      'releaseDt' => new DateTime("29-10-2018 00:00:00"),
      'available' => 2,
      'qt' => 2
    ]);

    Book::create([
      'title' => "Programação em Baixo Nível: C, Assembly e Execução de Programas na Arquitetura Intel 64",
      'author' => "Igor Zhirkov",
      'desc' => 'Conheça a linguagem Assembly e a arquitetura do Intel 64, torne-se proficiente em C e entenda como os programas são compilados e executados até o nível das instruções de máquina, permitindo-lhe escrever um código robusto e de alto desempenho. "Programação em baixo nível" explica a arquitetura do Intel 64 como resultado da evolução da arquitetura de von Neumann. O livro o ensina a usar a versão mais recente da linguagem C (C11) e a linguagem Assembly desde o básico. Todo o caminho, do código-fonte à execução do programa, incluindo a geração de arquivos-objeto ELF, além das ligações estática e dinâmica, será discutido. Há exemplos de código e exercícios, junto com as melhores práticas de programação. Os recursos de otimização e os limites dos compiladores modernos serão analisados, permitindo-lhe promover um equilíbrio entre a legibilidade do programa e o desempenho. O uso de diversas técnicas para ganho de desempenho, por exemplo, instruções SSE e pre-fetching, será demonstrado. Assuntos relevantes em ciência da computação, como os modelos de computação e as gramáticas formais, também serão tratados, explicando-se sua importância prática. Programação em baixo nível ensina os programadores a: escrever livremente em linguagem Assembly; compreender o modelo de programação do Intel 64; escrever um código robusto e fácil de manter em C11.',
      'publisher' => "Novatec",
      'qtpages' => 576,
      'category' => "linguagens",
      'imgUrl' => "https://m.media-amazon.com/images/P/B07C7J1PS1.01._SCLZZZZZZZ_SX500_.jpg",
      'releaseDt' => new DateTime("17-04-2018 00:00:00"),
      'available' => 2,
      'available' => 2,
      'qt' => 2
    ]);

    Book::create([
      'title' => "Introdução à Linguagem SQL: Abordagem Prática Para Iniciantes",
      'author' => "Thomas Nield",
      'desc' => "Atualmente as empresas estão coletando dados a taxas exponenciais e mesmo assim poucas pessoas sabem como acessá-los de maneira relevante. Se você trabalha em uma empresa ou é profissional de TI, este curto guia prático lhe ensinará como obter e transformar dados com o SQL de maneira significativa. Você dominará rapidamente os aspectos básicos do SQL e aprenderá como criar seus próprios bancos de dados.O autor Thomas Nield fornece exercícios no decorrer de todo o livro para ajudá-lo a praticar em casa suas recém descobertas aptidões no uso do SQL, sem precisar empregar um ambiente de servidor de banco de dados. Além de aprender a usar instruções-chave do SQL para encontrar e manipular seus dados, você descobrirá como projetar e gerenciar eficientemente bancos de dados que atendam às suas necessidades",
      'publisher' => "Novatec",
      'qtpages' => 144,
      'category' => "banco de dados",
      'imgUrl' => "https://m.media-amazon.com/images/P/B07QJ778RB.01._SCLZZZZZZZ_SX500_.jpg",
      'releaseDt' => new DateTime("03-05-2016 00:00:00"),
      'available' => 2,
      'available' => 2,
      'qt' => 2
    ]);

    Book::create([
      'title' => "Arquitetura limpa: O guia do artesão para estrutura e design de software",
      'author' => "Uncle Bob",
      'desc' => 'As regras universais de arquitetura de software aumentam dramaticamente a produtividade dos desenvolvedores ao longo da vida dos sistemas de software. Agora, aproveitando o sucesso dos seus best-sellers "Código Limpo" e "O Codificador Limpo", o lendário artesão de software Robert C. Martin (“Uncle Bob”) vai revelar essas regras e ajudar o leitor a aplicá-las.A "Arquitetura Limpa" de Martin não é só mais um catálogo de opções. Com base em meio século de experiência nos mais variados ambientes de software, Martin indica as escolhas que você deve fazer e explica por que elas são cruciais para o seu sucesso. Como já era esperado do Uncle Bob, este livro está cheio de soluções simples e diretas para os desafios reais que você enfrentará - aqueles que irão influenciar diretamente o sucesso ou fracasso dos seus projetos. Aprenda sobre as metas dos arquitetos de software - e as principais disciplinas e práticas que podem concretizá-las;Domine os princípios essenciais do design de software para abordar função, separação de componentes e gestão de dados;Veja como os paradigmas de programação impõem disciplina ao restringirem as ações dos desenvolvedores;Saiba identificar o que é crucialmente importante e o que é apenas um “detalhe”;Implemente estruturas ótimas e de alto nível para web, banco de dados, thick-client, console e aplicativos incorporados;Defina limites e camadas adequadas e organize os componentes e serviços;Saiba por que designs e arquiteturas dão errado e como prevenir (ou corrigir) essas falhas.',
      'publisher' => "Alta Books",
      'qtpages' => 432,
      'category' => "arquitetura",
      'imgUrl' => "https://m.media-amazon.com/images/P/B085PP6Y8P.01._SCLZZZZZZZ_SX500_.jpg",
      'releaseDt' => new DateTime("23-04-2019 00:00:00"),
      'available' => 6,
      'qt' => 6
    ]);

    Book::create([
      'title' => "Refatoração: Aperfeiçoando o Design de Códigos Existentes",
      'author' => "Martin Fowler",
      'desc' => "Por mais de vinte anos, programadores experientes no mundo inteiro contaram com o livro Refatoração de Martin Fowler para aperfeiçoar o design de códigos existentes e melhorar a manutenibilidade do software, assim como para deixar o código existente mais fácil de entender. Essa nova edição ansiosamente esperada foi atualizada por completo para refletir mudanças vitais no domínio da programação. Refatoração 2ª edição contém um catálogo atualizado das refatorações e inclui exemplos de código JavaScript bem como novos exemplos funcionais que demonstram a refatoração sem classes. Assim como na edição original, este livro explica o que é refatoração, por que você deve refatorar, como reorganizar um código que precise de refatoração e como fazer isso de forma bem-sucedida, independentemente da linguagem usada. • Entenda o processo e os princípios básicos da refatoração. • Aplique rapidamente refatorações convenientes para deixar um programa mais fácil de entender e de alterar. • Reconheça “maus cheiros” no código que sinalizam oportunidades para refatorar. • Explore as refatorações, cada uma com suas explicações, a motivação, o mecanismo e exemplos simples. • Escreva testes robustos para suas refatorações. • Reconheça as contrapartidas e os obstáculos para a refatoração.",
      'publisher' => "Novatec",
      'qtpages' => 456,
      'category' => "arquitetura",
      'imgUrl' => "https://m.media-amazon.com/images/P/B087N8LKYB.01._SCLZZZZZZZ_SX500_.jpg",
      'releaseDt' => new DateTime("30-04-2020 00:00:00"),
      'available' => 1,
      'qt' => 1
    ]);

    Book::create([
      'title' => "Java - Guia do Programador: Atualizado Para Java 16",
      'author' => "Peter Jandl Junior",
      'desc' => "Desenvolva aplicações usando o Java 16! Explore todas as vantagens da programação orientada a objetos por meio da elegante sintaxe Java. Aprenda a usar sobrecarga, herança, classes abstratas, polimorfismo, interfaces, genéricos e expressões lambda. Construa aplicações gráficas utilizando componentes Swing, tornando-as multitarefa com as threads. Organize as estruturas de dados necessárias por meio das coleções. Efetue operações de filtragem, mapeamento e redução. Opere dados de qualquer tipo com fluxos de dados, serialização e arquivos. Implemente aplicações comerciais capazes de acessar bancos de dados com a API JDBC ou de comunicar-se em rede local e na Internet por meio dos sockets e datagramas. Atualizado até o Java 16, o conteúdo do livro inclui integralmente as certificações Oracle Certified Associate Java Programmer e Oracle Certified Professional Java Programmer I, além de quase todas as exigências do nível Programmer II. São mais de 250 exemplos completos, comentados em detalhe; centenas de fragmentos de código prontos para uso; e muitas telas e diagramas. São comentadas 400 classes da API Java, além de incluir mais de uma centena de exercícios de revisão. Todo o material de apoio está disponível no GitHub.",
      'publisher' => "Novatec",
      'qtpages' => 552,
      'category' => "linguagens",
      'imgUrl' => "https://m.media-amazon.com/images/P/B094XCWH2H.01._SCLZZZZZZZ_SX500_.jpg",
      'releaseDt' => new DateTime("17-05-2021 00:00:00"),
      'available' => 1,
      'qt' => 1
    ]);

    Book::create([
      'title' => "Linguagem de Programacao Cobol Para Mainframe",
      'author' => " Wojciechowski",
      'desc' => "Este livro é destinado a pessoas interessadas em ingressar num dos ramos da informática que mais cresce nos últimos anos. Estudantes de informática de qualquer nível que desejam conhecer esta linguagem encontrarão neste livro uma forma didática seqüencial e com estruturas que podem ser utilizadas como referência para a construção de qualquer tipo e complexidade de programa na linguagem COBOL no ambiente Mainframe. Profissionais que já atuam no ambiente Mainframe em sistemas construídos em outras linguagens que interagem com o Mainframe através da linguagem COBOL também encontram neste livro um embasamento que irá ajudar a entender e a construir melhores estruturas de programas",
      'publisher' => "Ciencia Moderna",
      'qtpages' => 216,
      'category' => "linguagens",
      'imgUrl' => "https://m.media-amazon.com/images/I/41KT45GeWGL.jpg",
      'releaseDt' => new DateTime("17-04-2018 00:00:00"),
      'available' => 1,
      'qt' => 1
    ]);

    Book::create([
      'title' => "Introducao Arquit. Mainframe e Sistema Opr. Z/Os",
      'author' => " Jorge (orgs.) Oliveira, Saulo E Soares",
      'desc' => '“Comecei a trabalhar com “mainframes” no início de 1969. Trabalhei com os sistemas Operacionais TOS, DOS, DOS/VS, DOS/VS Power, MFT, OS/VS1 e todos os outros que sucederam ao MFT, nas mais diversas plataformas de “hardware”. Com grande tristeza, vi os sistemas de “mainframes” serem substituídos por outras plataformas e quase desaparecer a sua cultura: especialistas, conhecimentos e experiências. Embora os “mainframes” tenham resistido, atualmente é uma grande dificuldade encontrar profissionais para esta área. Espera-se que este livro supra uma grande lacuna existente no mercado, relativa às publicações dirigidas a este segmento de leitores e resgatar um pouco desta cultura. Bem atualizado, cobrindo vários segmentos desta vasta área, será de grande ajuda aos principiantes e mesmo aos veteranos na reciclagem dos conhecimentos.” Antonio Celso Magalhães – Gerente de Grande Porte do PRODERJ. “Em um mundo onde o conhecimento e atualização são requisitos básicos para acompanhar o ritmo do mercado de TI e aumentar suas chances de crescimento profissional e empregabilidade; boas fontes de aprendizado tornam-se ferramentas fundamentais. Este livro com certeza é uma destas ferramentas e de posse obrigatória para quem quer ter uma carreira de sucesso. Ana Carolina M. P. Neves – University Relations Manager/IBM Academic Initiative – HR. “Um livro de relevante importância, sendo um ótimo recurso até mesmo por ser um assunto carente na Web e no mercado como um todo. Uma obra completa, didática, bem ilustrada e de fácil entendimento para todos os profissionais da área de Mainframe que buscam aperfeiçoar-se no tema. Sem dúvida uma ótima fonte de estudo e aprendizado.” Leonardo Riego Pereira – AS / IBM Global Services Brazil – IT Specialist e IBM Academic Ambassador.',
      'publisher' => "Conrad",
      'qtpages' => 160,
      'category' => "derivados",
      'imgUrl' => "https://m.media-amazon.com/images/I/41zmGlewP9L.jpg",
      'releaseDt' => new DateTime("01-01-2008 00:00:00"),
      'available' => 1,
      'qt' => 1
    ]);

    Book::create([
      'title' => "Linux A Bíblia: O Mais Abrangente e Definitivo Guia Sobre Linux",
      'author' => " Christopher Negus",
      'desc' => "Linux A BIBLÍA Desenvolva habilidades em desktop e servidor Linux; Avance para o nível da computação corporativa; Torne-se um administrador de sistema ou um usuário avançado; Tutorial passo a passo para Dominar o Linux; Guia Completo para se tornar um profissional Linux. Quer adquirir uma base para se tornar um profissional certificado em Linux, iniciar em uma carreira que vai durar décadas, dominar habilidades que você pode usar em todas as distribuições Linux. Inicie com qualquer sistema Linux e avance para a computação corporativa utilizando Linux – utilize sua distribuição Linux favorita para aprender a testar suas habilidades com as ferramentas de linha de comando do Linux. Aprenda tarefas de administração de sistema profissional usando Fedora, o Red Hat Enterprise Linux ou outros sistemas corporativos.",
      'publisher' => "Alta Books",
      'qtpages' => 1611,
      'category' => "derivados",
      'imgUrl' => "https://m.media-amazon.com/images/P/B07H8Q5B6Y.01._SCLZZZZZZZ_SX500_.jpg",
      'releaseDt' => new DateTime("17-04-2018 00:00:00"),
      'available' => 1,
      'qt' => 1
    ]);

    Book::create([
      'title' => "Introdução ao MongoDB",
      'author' => "David Hows (Autor), Peter Membrey (Autor), Eelco Plugge (Autor)",
      'desc' => "Você precisa de uma introdução rápida e fácil aos bancos de dados MongoDB e NoSQL? O livro Introdução ao MongoDB, mostra como um sistema de banco de dados orientado a documentos difere de um banco de dados relacional, explica como instalá-lo e começar a usá-lo. Você também conhecerá o básico sobre o design do MongoDB, incluindo a indexação geoespacial, aprenderá a navegar, a visualizar e a fazer consultas em seu banco de dados e a usar o GridFS com um pouco de Python",
      'publisher' => "Novatec",
      'qtpages' => 168,
      'category' => "banco de dados",
      'imgUrl' => "https://m.media-amazon.com/images/P/B082HZTJHZ.01._SCLZZZZZZZ_SX500_.jpg",
      'releaseDt' => new DateTime("05-03-2015 00:00:00"),
      'available' => 1,
      'qt' => 1
    ]);

    Book::create([
      'title' => "Técnicas de Invasão: Aprenda as técnicas usadas por hackers em invasões reais",
      'author' => "Bruno Fraga",
      'desc' => "Este não é um livro comum. Você está prestes a obter um conhecimento muito privilegiado em segurança da informação e hacking, dominar ferramentas e desmistificar invasões reais. Esta obra parte de uma metodologia diferenciada e prática, ensinando a todos os leitores – do completo leigo ao profissional da área – como avançar e explorar as vulnerabilidades de um mundo onde uma única falha pode custar milhões de dólares para empresas, organizações e indivíduos desprotegidos. Com este livro, você aprenderá a: • conhecer o seu alvo em uma invasão; • identificar pontos fracos e vulnerabilidades; • quebrar senhas; • realizar ataques na rede; • atacar redes Wi-Fi; • manipular indivíduos com Engenharia Social; • e muito mais. Seja bem-vindo ao Técnicas de Invasão",
      'publisher' => "Editora Labrador",
      'qtpages' => 296,
      'category' => "seguranca",
      'imgUrl' => "https://m.media-amazon.com/images/P/B08255WXST.01._SCLZZZZZZZ_SX500_.jpg",
      'releaseDt' => new DateTime("09-11-2019 00:00:00"),
      'available' => 3,
      'qt' => 3
    ]);

    Book::create([
      'title' => "Introdução ao Pentest",
      'author' => "Daniel Moreno",
      'desc' => "Introdução ao Pentest irá capacitar o leitor a entender e a realizar o pentest – uma auditoria minuciosa sobre falhas e vulnerabilidades em computadores e redes – e, assim, buscar a melhor forma de solucionar os problemas encontrados. Tendo como base a metodologia Kali Linux para o ensino do pentest, a qual é extremamente didática e adaptada a partir da metodologia PTES de testes de invasão, com certeza este livro fará você se sentir à vontade e confiante ao estudar pentest, tornando o seu aprendizado fácil e rápido. O leitor terá acesso às táticas e técnicas utilizadas no pentest em um ambiente controlado por laboratório e máquinas virtuais. Cada capítulo aborda uma etapa do pentest e, no decorrer da leitura, você aprenderá: Os aspectos básicos de segurança da informação, como a instalação de máquinas virtuais e os primeiros passos com o Kali Linux. Criar redes zumbie para ataques DDoS utilizando o IRC como rede mestre. Realizar a evasão de sistemas de antivírus usando as linguagens de programação C, Python e Powershell. Os princípios básicos do desenvolvimento de exploits. Usar o framework Metasploit. Criar um gerador de shellcode para Windows. Escalonar privilégios em sistemas Windows sem usar exploits. Realizar a evasão de sistemas UAC e do sistema de autenticação de dois fatores. Realizar o DNS Spoof a fim de redirecionar o usuário para uma página web específica. Criar um pendrive infectado com o Arduino (antigo BadUSB). Escrever e criptografar um relatório de pentest",
      'publisher' => "Novatec",
      'qtpages' => 384,
      'category' => "seguranca",
      'imgUrl' => "https://m.media-amazon.com/images/I/716vjw3vL9L.jpg",
      'releaseDt' => new DateTime("28-10-2019 00:00:00"),
      'available' => 1,
      'qt' => 1
    ]);


    Book::create([
      'title' => "Testes de Invasão: uma Introdução Prática ao Hacking",
      'author' => "Georgia Weidman",
      'desc' => "No livro Testes de invasão, a especialista em segurança, pesquisadora e instrutora Georgia Weidman apresenta as principais habilidades e técnicas necessárias a todo pentester. Ao usar um laboratório baseado em máquinas virtuais que inclui o Kali Linux e sistemas operacionais vulneráveis, você verá uma série de lições práticas usando ferramentas como o Wireshark, o Nmap e o Burp Suite. À medida que acompanhar as lições usando o laboratório e realizando ataques, você vivenciará as fases fundamentais de uma avaliação de verdade – que incluem a coleta de informações, a descoberta de vulnerabilidades passíveis de exploração, a obtenção de acesso aos sistemas, a pós-exploração de falhas, além de outras atividades.",
      'publisher' => "Novatec",
      'qtpages' => 2,
      'category' => "seguranca",
      'imgUrl' => "https://m.media-amazon.com/images/P/B06Y3H7NLY.01._SCLZZZZZZZ_SX500_.jpg",
      'releaseDt' => new DateTime("10-11-2014 00:00:00"),
      'available' => 2,
      'qt' => 2
    ]);

    Book::create([
      'title' => "Administração de Redes Linux: Conceitos e Práticas na Administração de Redes em Ambiente Linux",
      'author' => "Ricardo Lno Olonca",
      'desc' => "Como um firewall funciona? Como configurar o Squid? Como funciona um proxy? O que é possível fazer com o iptables? Como calcular a máscara de sub-rede? São perguntas que todo profissional que trabalha na administração de redes deveria saber responder. O assunto é muito amplo, não se resumindo apenas à configuração das interfaces. Rotas, bloqueios, limitações, filtros e alta disponibilidade são apenas alguns dos milhares de assuntos da área de redes, e dominar seus conceitos, suas práticas e possibilidades requer estudo, treino e tempo. Este livro mostra os conceitos fundamentais, as configurações e como fazer análises de desempenho e de problemas envolvendo redes. Também ensina o funcionamento dos principais serviços de rede, como roteamento, DNS, DHCP, firewall, NAT e proxy e como configurá-los em um ambiente Linux. Destina-se a profissionais de informática que já tenham conhecimentos em Linux e que desejam dominar os fundamentos da rede TCP/IP. O livro, ao estilo mão na massa, começa com assuntos simples e vai aumentando a complexidade conforme mostra exemplos práticos do dia a dia, que darão ao leitor o conhecimento necessário para administrar com eficiência e segurança uma rede em ambiente Linux. [...] ",
      'publisher' => "Novatec",
      'qtpages' => 256,
      'category' => "redes",
      'imgUrl' => "https://m.media-amazon.com/images/P/B07C2KWL16.01._SCLZZZZZZZ_SX500_.jpg",
      'releaseDt' => new DateTime("03-11-2015 00:00:00"),
      'available' => 7,
      'qt' => 7
    ]);

    Book::create([
      'title' => "Laboratórios de Tecnologias Cisco em Infraestrutura de Redes",
      'author' => "Samuel H. . Brito",
      'desc' => "As tecnologias de interconexão de redes de computadores nunca estiveram tão em evidência quanto nos últimos anos. Isso se deve à convergência dos diversos meios de comunicação em um núcleo integrado que utiliza como base o Protocolo IP, ou seja, a mesma tecnologia que viabilizou a disseminação da Internet em escala mundial. Da mesma forma que cresce a adoção das tecnologias de comunicação, também cresce a demanda por profissionais qualificados que estejam preparados para lidar operacionalmente com essas tecnologias e que sejam capazes de acompanhar o ritmo acelerado das mudanças nessa área. Este livro consiste na compilação de laboratórios práticos que o autor utiliza em suas aulas de graduação e pós-graduação em cursos de computação, com foco no currículo da Academia Cisco (Cisco NetAcad).  O leitor deve ter em mente que o foco desta obra não é aprofundar nos fundamentos teóricos das tecnologias de redes relacionadas aos laboratórios em si, uma vez que o objetivo é que o livro possa servir como ferramenta de apoio para professores, alunos e demais interessados na área de redes que pretendam estudar os aspectos práticos de implantação, operação e manutenção das diversas tecnologias que fazem parte do cotidiano de um profissional dessa área. O livro também é uma excelente fonte de estudos para as práticas cobradas nos principais exames de certificação da Cisco. ",
      'publisher' => "Novatec",
      'qtpages' => 328,
      'category' => "redes",
      'imgUrl' => "https://m.media-amazon.com/images/I/71vmWltRtgL.jpg",
      'releaseDt' => new DateTime("14-07-2014 00:00:00"),
      'available' => 1,
      'qt' => 1
    ]);

    Book::create([
      'title' => "Introdução ao DNS: Aprenda a Instalar e Configurar uma Infraestrutura de DNS na Prática",
      'author' => "Celso Marcos Furtado",
      'desc' => "O DNS (Domain Name System) é um dos protocolos mais importantes utilizados na Internet e em redes locais, pois permite que o usuário acesse os recursos disponibilizados na rede utilizando apenas o nome de um computador, em vez do seu endereço IP. O BIND, por sua vez, é um dos softwares mais utilizados no mundo para implementar o protocolo DNS, e pode ser usado em diversas plataformas, como Windows e GNU/Linux. O objetivo principal deste livro é proporcionar ao leitor um entendimento sobre os principais conceitos envolvidos na infraestrutura de DNS por meio da implementação prática de servidores DNS usando GNU/Linux e Windows",
      'publisher' => "Novatec",
      'qtpages' => 136,
      'category' => "redes",
      'imgUrl' => "https://m.media-amazon.com/images/I/717leBtCkXL.jpg",
      'releaseDt' => new DateTime("01-11-2016 00:00:00"),
      'available' => 2,
      'qt' => 2
    ]);

    Book::create([
      'title' => "Análise de Tráfego em Redes TCP/IP: Utilize Tcpdump na Análise de Tráfegos em Qualquer Sistema Operacional",
      'author' => "João Eriberto Mota Filho",
      'desc' => "O grande objetivo deste livro é mostrar como realizar a análise de tráfego em redes. A nova geração IP (IPv6) também é abordada com certa profundidade, garantindo um bom entendimento sobre essa tecnologia. Este livro utiliza o tcpdump, exaustivamente, para demonstrar a teoria com base em capturas de tráfego e, consequentemente, ensinar sua análise. Todo o trabalho está dividido em uma introdução e cinco partes, a saber: conceitos básicos; protocolos básicos em redes TCP/IP e sua análise; conhecimentos específicos em redes TCP/IP e sua análise; tráfegos diversos e sistemas específicos; apêndices.  É feita uma ampla abordagem sobre protocolos de rede e assuntos correlatos, como IPv4, IPv6, TCP, UDP, ICMP, Ethernet, ARP e NDP, Modelo OSI, roteamento em redes, bridges e sistemas de firewall. Também serão realizados trabalhos com simuladores de redes e programas para detectar invasões.",
      'publisher' => "Novatec",
      'qtpages' => 416,
      'category' => "redes",
      'imgUrl' => "https://m.media-amazon.com/images/I/81x-nHq0GXL.jpg",
      'releaseDt' => new DateTime("02-08-2013 00:00:00"),
      'available' => 2,
      'qt' => 2
    ]);
    
    Book::create([
      'title' => "A vida de um boxer pt-2",
      'author' => "Boxer",
      'desc' => "Lorem ipsum dolor sit amet, qui minim labore adipisicing minim sint cillum sint consectetur cupidatat.",
      'publisher' => "Canil",
      'qtpages' => 9520,
      'category' => "derivados",
      'imgUrl' => "https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.udow1o4LkqBNy_8ZVELhnAHaIa%26pid%3DApi&f=1&ipt=4f2a6969251f02ce331dc9ee165f7f3a5f005b984feb1395248c5f17f14a2036&ipo=images",
      'releaseDt' => new DateTime("19-01-2014 00:00:00"),
      'available' => 9,
      'qt' => 9
    ]);
     Book::create([
      'title' => "A vida de um boxer pt-1",
      'author' => "Boxer",
      'desc' => "Lorem ipsum dolor sit amet, qui minim labore adipisicing minim sint cillum sint consectetur cupidatat.",
      'publisher' => "Canil",
      'qtpages' => 9520,
      'category' => "derivados",
      'imgUrl' => "https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse2.mm.bing.net%2Fth%3Fid%3DOIP.1q-NG7ioPXeb2YD7yjjffwHaFj%26pid%3DApi&f=1&ipt=7b330a51d15833dcffde690ac3f3f34cb192ac90aa8c8c4fb12fb69f6cba997b&ipo=images",
      'releaseDt' => new DateTime("19-01-2014 00:00:00"),
      'available' => 9,
      'qt' => 9
    ]);
    
    /*
    Book::create([
      'title'=>"",
      'author'=>"",
      'desc'=>"",
      'publisher'=>"",
      'qtpages'=>2,
      'category'=>"",
      'imgUrl'=>"",
      'releaseDt'=> new DateTime("17-04-2018 00:00:00"),
      'available'=>2,
      'qt'=>""
    ]);
    */
  }
}
