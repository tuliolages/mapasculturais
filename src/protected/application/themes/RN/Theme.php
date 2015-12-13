<?php
namespace RN;
use MapasCulturais\Themes\BaseV1;
use MapasCulturais\App;

class Theme extends BaseV1\Theme{

    protected static function _getTexts(){
        $app = App::i();
        $self = $app->view;
        $url_search_agents = $self->searchAgentsUrl;
        $url_search_spaces = $self->searchSpacesUrl;
        $url_search_events = $self->searchEventsUrl;
        $url_search_projects = $self->searchProjectsUrl;

        return [
           'site: name' => App::i()->config['app.siteName'],
           'site: description' => App::i()->config['app.siteDescription'],

           'site: of the region' => 'do Estado do Rio Grande do Norte',
           'site: owner' => 'Secretaria da Cultura do Rio Grande do Norte',
           'site: by the site owner' => 'pela Secretaria da Cultura do Rio Grande do Norte',

           'home: welcome' => "Cultura RN é a plataforma livre, gratuita e colaborativa de mapeamento da Secretaria da Cultura do Rio Grande do Norte sobre o cenário cultural gaúcho. Ficou mais fácil se programar para conhecer as opções culturais que o estado oferece: shows musicais, espetáculos teatrais, sessões de cinema, saraus, entre outras. Além de conferir a agenda de eventos, você também pode colaborar na gestão da cultura do Rio Grande: basta criar seu perfil de agente cultural. A partir deste cadastro, é mais fácil participar dos editais de fomento às artes do Governo do Estado e também divulgar seus eventos, espaços ou projetos.",
           'home: events' => "Você pode pesquisar eventos culturais nos campos de busca combinada. Como usuário cadastrado, você pode incluir seus eventos na plataforma e divulgá-los gratuitamente.",
           'home: agents' => "Você pode colaborar na gestão da cultura com suas próprias informações, preenchendo seu perfil de agente cultural. Neste espaço, estão registrados artistas, gestores e produtores; uma rede de atores envolvidos na cena cultural paulistana. Você pode cadastrar um ou mais agentes (grupos, coletivos, bandas instituições, empresas, etc.), além de associar ao seu perfil eventos e espaços culturais com divulgação gratuita.",
           'home: spaces' => "Procure por espaços culturais incluídos na plataforma, acessando os campos de busca combinada que ajudam na precisão de sua pesquisa. Cadastre também os espaços onde desenvolve suas atividades artísticas e culturais.",
           'home: projects' => "Reúne projetos culturais ou agrupa eventos de todos os tipos. Neste espaço, você encontra leis de fomento, mostras, convocatórias e editais criados, além de diverNas iniciativas cadastradas pelos usuários da plataforma. Cadastre-se e divulgue seus projetos.",

           'home: abbreviation' => "SEDAC",
           'home: home_devs' => 'Existem algumas maneiras de desenvolvedores interagirem com o CulturaRN. A primeira é através da nossa <a href="https://github.com/hacklabr/mapasculturais/blob/master/doc/api.md" target="_blank">API</a>. Com ela você pode acessar os dados públicos no nosso banco de dados e utilizá-los para desenvolver aplicações externas. Além disso, o Mapas Culturais é construído a partir do sofware livre <a href="http://institutotim.org.br/project/mapas-culturais/" target="_blank">Mapas Culturais</a>, criado em parceria com o <a href="http://institutotim.org.br" target="_blank">Instituto TIM</a>, e você pode contribuir para o seu desenvolvimento através do <a href="https://github.com/hacklabr/mapasculturais/" target="_blank">GitHub</a>.',
           'home: colabore' => "Colabore com o CulturaRN",
        ];
    }

    static function getThemeFolder() {
        return __DIR__;
    }

    function _init() {
        parent::_init();
        $app = App::i();
        $app->hook('view.render(<<*>>):before', function() use($app) {
            $this->_publishAssets();
        });
    }

    protected function _publishAssets() {
      $this->jsObject['assets']['fundo-rn'] = $this->asset('img/fundo-rn.png', false);
    }

}
