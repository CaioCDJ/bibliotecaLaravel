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
      'title'=>"Linguagem C - Completa e Descomplicada",
      'author'=>"André Backes",
      'desc'=>"Criada em 1972 nos laboratórios Bell por Dennis Ritchie, a linguagem C se tornou uma das mais bem-sucedidas linguagens de alto nível já criadas, sendo considerada até hoje, na maioria dos cursos de computação do país, a linguagem básica para o aprendizado de disciplinas introdutórias em programação. Com um teor de abstração relativamente elevado, ela está mais próxima da linguagem humana do que o código de máquina. Ainda assim, é considerada por muitos uma linguagem de difícil aprendizado. Com o objetivo de simplificar o ensino da disciplina, André Backes apresenta na 2ª edição de Linguagem C uma nova abordagem que descomplica os conceitos da linguagem por meio de diversos recursos didáticos e ilustrativos, incluindo lembretes e avisos que ressaltam os seus pontos-chave, além de exemplos simples e claros sobre como utilizá-la. Este livro traz um programa de um curso completo de linguagem C, tratando com simplicidade dos assuntos mais complicados até os mais básicos. Um livro essencial para os estudantes e profissionais da área de Computação!",
      'publisher'=>"GEN LTC",
      'qtpages'=>448,
      'category'=>"linguagens",
      'imgUrl'=>"https://m.media-amazon.com/images/P/B07K27L496.01._SCLZZZZZZZ_SX500_.jpg",
      'releaseDt'=> new DateTime("29-10-2018 00:00:00"),
      'available'=>2,
      'qt'=>2
    ]);

    Book::create([
      'title'=>"Programação em Baixo Nível: C, Assembly e Execução de Programas na Arquitetura Intel 64",
      'author'=>"Igor Zhirkov",
      'desc'=>'Conheça a linguagem Assembly e a arquitetura do Intel 64, torne-se proficiente em C e entenda como os programas são compilados e executados até o nível das instruções de máquina, permitindo-lhe escrever um código robusto e de alto desempenho. "Programação em baixo nível" explica a arquitetura do Intel 64 como resultado da evolução da arquitetura de von Neumann. O livro o ensina a usar a versão mais recente da linguagem C (C11) e a linguagem Assembly desde o básico. Todo o caminho, do código-fonte à execução do programa, incluindo a geração de arquivos-objeto ELF, além das ligações estática e dinâmica, será discutido. Há exemplos de código e exercícios, junto com as melhores práticas de programação. Os recursos de otimização e os limites dos compiladores modernos serão analisados, permitindo-lhe promover um equilíbrio entre a legibilidade do programa e o desempenho. O uso de diversas técnicas para ganho de desempenho, por exemplo, instruções SSE e pre-fetching, será demonstrado. Assuntos relevantes em ciência da computação, como os modelos de computação e as gramáticas formais, também serão tratados, explicando-se sua importância prática. Programação em baixo nível ensina os programadores a: escrever livremente em linguagem Assembly; compreender o modelo de programação do Intel 64; escrever um código robusto e fácil de manter em C11.',
      'publisher'=>"Novatec",
      'qtpages'=>576,
      'category'=>"linguagens",
      'imgUrl'=>"https://m.media-amazon.com/images/P/B07C7J1PS1.01._SCLZZZZZZZ_SX500_.jpg",
      'releaseDt'=> new DateTime("17-04-2018 00:00:00"),
      'available'=>2,
      'available'=>2,
      'qt'=>2
    ]);
    
    Book::create([
      'title'=>"Introdução à Linguagem SQL: Abordagem Prática Para Iniciantes",
      'author'=>"Thomas Nield",
      'desc'=>"Atualmente as empresas estão coletando dados a taxas exponenciais e mesmo assim poucas pessoas sabem como acessá-los de maneira relevante. Se você trabalha em uma empresa ou é profissional de TI, este curto guia prático lhe ensinará como obter e transformar dados com o SQL de maneira significativa. Você dominará rapidamente os aspectos básicos do SQL e aprenderá como criar seus próprios bancos de dados.O autor Thomas Nield fornece exercícios no decorrer de todo o livro para ajudá-lo a praticar em casa suas recém descobertas aptidões no uso do SQL, sem precisar empregar um ambiente de servidor de banco de dados. Além de aprender a usar instruções-chave do SQL para encontrar e manipular seus dados, você descobrirá como projetar e gerenciar eficientemente bancos de dados que atendam às suas necessidades",
      'publisher'=>"Novatec",
      'qtpages'=>144,
      'category'=>"banco de dados",
      'imgUrl'=>"https://m.media-amazon.com/images/P/B07QJ778RB.01._SCLZZZZZZZ_SX500_.jpg",
      'releaseDt'=> new DateTime("03-05-2016 00:00:00"),
      'available'=>2,
      'available'=>2,
      'qt'=>2
    ]);
    
    Book::create([
      'title'=>"Arquitetura limpa: O guia do artesão para estrutura e design de software",
      'author'=>"Uncle Bob",
      'desc'=>'As regras universais de arquitetura de software aumentam dramaticamente a produtividade dos desenvolvedores ao longo da vida dos sistemas de software. Agora, aproveitando o sucesso dos seus best-sellers "Código Limpo" e "O Codificador Limpo", o lendário artesão de software Robert C. Martin (“Uncle Bob”) vai revelar essas regras e ajudar o leitor a aplicá-las.A "Arquitetura Limpa" de Martin não é só mais um catálogo de opções. Com base em meio século de experiência nos mais variados ambientes de software, Martin indica as escolhas que você deve fazer e explica por que elas são cruciais para o seu sucesso. Como já era esperado do Uncle Bob, este livro está cheio de soluções simples e diretas para os desafios reais que você enfrentará - aqueles que irão influenciar diretamente o sucesso ou fracasso dos seus projetos. Aprenda sobre as metas dos arquitetos de software - e as principais disciplinas e práticas que podem concretizá-las;Domine os princípios essenciais do design de software para abordar função, separação de componentes e gestão de dados;Veja como os paradigmas de programação impõem disciplina ao restringirem as ações dos desenvolvedores;Saiba identificar o que é crucialmente importante e o que é apenas um “detalhe”;Implemente estruturas ótimas e de alto nível para web, banco de dados, thick-client, console e aplicativos incorporados;Defina limites e camadas adequadas e organize os componentes e serviços;Saiba por que designs e arquiteturas dão errado e como prevenir (ou corrigir) essas falhas.',
      'publisher'=>"Alta Books",
      'qtpages'=>432,
      'category'=>"arquitetura",
      'imgUrl'=>"https://m.media-amazon.com/images/P/B085PP6Y8P.01._SCLZZZZZZZ_SX500_.jpg",
      'releaseDt'=> new DateTime("23-04-2019 00:00:00"),
      'available'=>6,
      'qt'=>6
    ]);
    
    Book::create([
      'title'=>"Refatoração: Aperfeiçoando o Design de Códigos Existentes",
      'author'=>"Martin Fowler",
      'desc'=>"Por mais de vinte anos, programadores experientes no mundo inteiro contaram com o livro Refatoração de Martin Fowler para aperfeiçoar o design de códigos existentes e melhorar a manutenibilidade do software, assim como para deixar o código existente mais fácil de entender. Essa nova edição ansiosamente esperada foi atualizada por completo para refletir mudanças vitais no domínio da programação. Refatoração 2ª edição contém um catálogo atualizado das refatorações e inclui exemplos de código JavaScript bem como novos exemplos funcionais que demonstram a refatoração sem classes. Assim como na edição original, este livro explica o que é refatoração, por que você deve refatorar, como reorganizar um código que precise de refatoração e como fazer isso de forma bem-sucedida, independentemente da linguagem usada. • Entenda o processo e os princípios básicos da refatoração. • Aplique rapidamente refatorações convenientes para deixar um programa mais fácil de entender e de alterar. • Reconheça “maus cheiros” no código que sinalizam oportunidades para refatorar. • Explore as refatorações, cada uma com suas explicações, a motivação, o mecanismo e exemplos simples. • Escreva testes robustos para suas refatorações. • Reconheça as contrapartidas e os obstáculos para a refatoração.",
      'publisher'=>"Novatec",
      'qtpages'=>456,
      'category'=>"arquitetura",
      'imgUrl'=>"https://m.media-amazon.com/images/P/B087N8LKYB.01._SCLZZZZZZZ_SX500_.jpg",
      'releaseDt'=> new DateTime("30-04-2020 00:00:00"),
      'available'=>1,
      'qt'=>1
    ]);
    
    Book::create([
      'title'=>"Java - Guia do Programador: Atualizado Para Java 16",
      'author'=>"Peter Jandl Junior",
      'desc'=>"Desenvolva aplicações usando o Java 16! Explore todas as vantagens da programação orientada a objetos por meio da elegante sintaxe Java. Aprenda a usar sobrecarga, herança, classes abstratas, polimorfismo, interfaces, genéricos e expressões lambda. Construa aplicações gráficas utilizando componentes Swing, tornando-as multitarefa com as threads. Organize as estruturas de dados necessárias por meio das coleções. Efetue operações de filtragem, mapeamento e redução. Opere dados de qualquer tipo com fluxos de dados, serialização e arquivos. Implemente aplicações comerciais capazes de acessar bancos de dados com a API JDBC ou de comunicar-se em rede local e na Internet por meio dos sockets e datagramas. Atualizado até o Java 16, o conteúdo do livro inclui integralmente as certificações Oracle Certified Associate Java Programmer e Oracle Certified Professional Java Programmer I, além de quase todas as exigências do nível Programmer II. São mais de 250 exemplos completos, comentados em detalhe; centenas de fragmentos de código prontos para uso; e muitas telas e diagramas. São comentadas 400 classes da API Java, além de incluir mais de uma centena de exercícios de revisão. Todo o material de apoio está disponível no GitHub.",
      'publisher'=>"Novatec",
      'qtpages'=>552,
      'category'=>"linguagens",
      'imgUrl'=>"https://m.media-amazon.com/images/P/B094XCWH2H.01._SCLZZZZZZZ_SX500_.jpg",
      'releaseDt'=> new DateTime("17-05-2021 00:00:00"),
      'available'=>1,
      'qt'=>1
    ]);
    
    Book::create([
      'title'=>"Linguagem de Programacao Cobol Para Mainframe",
      'author'=>" Wojciechowski",
      'desc'=>"Este livro é destinado a pessoas interessadas em ingressar num dos ramos da informática que mais cresce nos últimos anos. Estudantes de informática de qualquer nível que desejam conhecer esta linguagem encontrarão neste livro uma forma didática seqüencial e com estruturas que podem ser utilizadas como referência para a construção de qualquer tipo e complexidade de programa na linguagem COBOL no ambiente Mainframe. Profissionais que já atuam no ambiente Mainframe em sistemas construídos em outras linguagens que interagem com o Mainframe através da linguagem COBOL também encontram neste livro um embasamento que irá ajudar a entender e a construir melhores estruturas de programas",
      'publisher'=>"Ciencia Moderna",
      'qtpages'=>216,
      'category'=>"linguagens",
      'imgUrl'=>"https://m.media-amazon.com/images/I/41KT45GeWGL.jpg",
      'releaseDt'=> new DateTime("17-04-2018 00:00:00"),
      'available'=>1,
      'qt'=>1
    ]);

    Book::create([
      'title'=>"Introducao Arquit. Mainframe e Sistema Opr. Z/Os",
      'author'=>" Jorge (orgs.) Oliveira, Saulo E Soares",
      'desc'=>'“Comecei a trabalhar com “mainframes” no início de 1969. Trabalhei com os sistemas Operacionais TOS, DOS, DOS/VS, DOS/VS Power, MFT, OS/VS1 e todos os outros que sucederam ao MFT, nas mais diversas plataformas de “hardware”. Com grande tristeza, vi os sistemas de “mainframes” serem substituídos por outras plataformas e quase desaparecer a sua cultura: especialistas, conhecimentos e experiências. Embora os “mainframes” tenham resistido, atualmente é uma grande dificuldade encontrar profissionais para esta área. Espera-se que este livro supra uma grande lacuna existente no mercado, relativa às publicações dirigidas a este segmento de leitores e resgatar um pouco desta cultura. Bem atualizado, cobrindo vários segmentos desta vasta área, será de grande ajuda aos principiantes e mesmo aos veteranos na reciclagem dos conhecimentos.” Antonio Celso Magalhães – Gerente de Grande Porte do PRODERJ. “Em um mundo onde o conhecimento e atualização são requisitos básicos para acompanhar o ritmo do mercado de TI e aumentar suas chances de crescimento profissional e empregabilidade; boas fontes de aprendizado tornam-se ferramentas fundamentais. Este livro com certeza é uma destas ferramentas e de posse obrigatória para quem quer ter uma carreira de sucesso. Ana Carolina M. P. Neves – University Relations Manager/IBM Academic Initiative – HR. “Um livro de relevante importância, sendo um ótimo recurso até mesmo por ser um assunto carente na Web e no mercado como um todo. Uma obra completa, didática, bem ilustrada e de fácil entendimento para todos os profissionais da área de Mainframe que buscam aperfeiçoar-se no tema. Sem dúvida uma ótima fonte de estudo e aprendizado.” Leonardo Riego Pereira – AS / IBM Global Services Brazil – IT Specialist e IBM Academic Ambassador.',
      'publisher'=>"Conrad",
      'qtpages'=>160,
      'category'=>"derivados",
      'imgUrl'=>"https://m.media-amazon.com/images/I/41zmGlewP9L.jpg",
      'releaseDt'=> new DateTime("01-01-2008 00:00:00"),
      'available'=>1,
      'qt'=>1
    ]);
    
    Book::create([
      'title'=>"Linux A Bíblia: O Mais Abrangente e Definitivo Guia Sobre Linux",
      'author'=>" Christopher Negus",
      'desc'=>"Linux A BIBLÍA Desenvolva habilidades em desktop e servidor Linux; Avance para o nível da computação corporativa; Torne-se um administrador de sistema ou um usuário avançado; Tutorial passo a passo para Dominar o Linux; Guia Completo para se tornar um profissional Linux. Quer adquirir uma base para se tornar um profissional certificado em Linux, iniciar em uma carreira que vai durar décadas, dominar habilidades que você pode usar em todas as distribuições Linux. Inicie com qualquer sistema Linux e avance para a computação corporativa utilizando Linux – utilize sua distribuição Linux favorita para aprender a testar suas habilidades com as ferramentas de linha de comando do Linux. Aprenda tarefas de administração de sistema profissional usando Fedora, o Red Hat Enterprise Linux ou outros sistemas corporativos.",
      'publisher'=>"Alta Books",
      'qtpages'=>1611,
      'category'=>"derivados",
      'imgUrl'=>"https://m.media-amazon.com/images/P/B07H8Q5B6Y.01._SCLZZZZZZZ_SX500_.jpg",
      'releaseDt'=> new DateTime("17-04-2018 00:00:00"),
      'available'=>1,
      'qt'=>1
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
