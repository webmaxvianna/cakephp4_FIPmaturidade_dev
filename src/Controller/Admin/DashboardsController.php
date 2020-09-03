<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

class DashboardsController extends AppController
{

    public function index()
    {
        $this->set("title_for_layout", "Dashboard");

        $this->loadModel('Verifications');
        $verification = $this->Verifications->find('all', ['conditions' => ['user_id =' => $this->Auth->user('id')]])->first();
        // debug($verification);exit;
        if ($verification) {
            if ($verification->residencia) { $residencia = true; } else { $residencia = false; } 
            if ($verification->autorizacao_pais) { $autorizacao_pais = true; } else { $autorizacao_pais = false; } 
            if ($verification->identidade_frente) { $identidade_frente = true; } else { $identidade_frente = false; } 
            if ($verification->identidade_verso) { $identidade_verso = true; } else { $identidade_verso = false; } 
            if ($residencia && $autorizacao_pais && $identidade_frente && $identidade_verso) {
                $this->set('documentos', true);
            } else {
                $this->set('documentos', false);
            }
        } else {
            $this->set('documentos', false);
        }

        $this->loadModel('Resumes');
        $resume = $this->Resumes->find('all', ['conditions' => ['user_id =' => $this->Auth->user('id')]])->first();
        // debug($resume);exit;
        if ($resume) {
            if ($resume->curriculo) { $curriculo = true; } else { $curriculo = false; }
            if ($resume->area_atuacao) { $area_atuacao = true; } else { $area_atuacao = false; }
            if ($curriculo && $area_atuacao) {
                $resume = true;
            } else {
                $resume = false;
            }
        }
        // debug($resume);exit;

        $this->loadModel('CharacteristicsUsers');
        $characteristic = $this->CharacteristicsUsers->find('all', ['conditions' => ['user_id =' => $this->Auth->user('id')]])->first();
        // debug($characteristic);exit;
        $sobre = ($characteristic) ? true : false ;

        $this->loadModel('InterestsUsers');
        $interest = $this->InterestsUsers->find('all', ['conditions' => ['user_id =' => $this->Auth->user('id')]])->first();
        // debug($interest);exit;
        $interesse = ($interest) ? true : false ;
        
        $this->loadModel('Users');
        $user = $this->Users->find('all', ['conditions' => ['id =' => $this->Auth->user('id')]])->first();
        // debug($user);exit;
        if ($user->nome_completo) { $nome_completo = true; } else { $nome_completo = false; }
        if ($user->data_nascimento) { $data_nascimento = true; } else { $data_nascimento = false; }
        if ($user->sexo) { $sexo = true; } else { $sexo = false; }
        if ($user->cpf) { $cpf = true; } else { $cpf = false; }
        if ($user->rg) { $rg = true; } else { $rg = false; }
        if ($user->cep) { $cep = true; } else { $cep = false; }
        if ($user->logradouro) { $logradouro = true; } else { $logradouro = false; }
        if ($user->numero) { $numero = true; } else { $numero = false; }
        if ($user->bairro) { $bairro = true; } else { $bairro = false; }
        if ($user->cidade) { $cidade = true; } else { $cidade = false; }
        if ($user->estado) { $estado = true; } else { $estado = false; }
        if ($user->pais) { $pais = true; } else { $pais = false; }
        if ($nome_completo && $data_nascimento && $sexo && $cpf && $rg && $cep && $logradouro && $numero && $bairro && $cidade && $estado && $pais) {
            $user = true;
        } else {
            $user = false;
        }
        // debug($user);exit;

        if ($user && $resume && $sobre && $interesse) {
            $this->set('dados_pessoais', true);
        } else {
            $this->set('dados_pessoais', false);
        }



        $this->loadModel('Ideas');
        $idea = $this->Ideas->find('all', ['conditions' => ['user_id =' => $this->Auth->user('id')]])->first();
        // debug($idea);exit;

        if ($idea) {
            if ($idea->titulo) { $titulo = true; } else { $titulo = false; }
            if ($idea->descricao) { $descricao = true; } else { $descricao = false; }
            if ($idea->link_video) { $link_video = true; } else { $link_video = false; }
            if ($idea->canvas_atividades) { $canvas_atividades = true; } else { $canvas_atividades = false; }
            if ($idea->canvas_propostas) { $canvas_propostas = true; } else { $canvas_propostas = false; }
            if ($idea->canvas_relacionamentos) { $canvas_relacionamentos = true; } else { $canvas_relacionamentos = false; }
            if ($idea->canvas_recursos) { $canvas_recursos = true; } else { $canvas_recursos = false; }
            if ($idea->canvas_canais) { $canvas_canais = true; } else { $canvas_canais = false; }
            if ($idea->canvas_parceriaschaves) { $canvas_parceriaschaves = true; } else { $canvas_parceriaschaves = false; }
            if ($idea->canvas_segmentosdemercado) { $canvas_segmentosdemercado = true; } else { $canvas_segmentosdemercado = false; }
            if ($idea->canvas_estruturadecusto) { $canvas_estruturadecusto = true; } else { $canvas_estruturadecusto = false; }
            if ($idea->canvas_fontesderenda) { $canvas_fontesderenda = true; } else { $canvas_fontesderenda = false; }
            if ($idea->sumario_segredo) { $sumario_segredo = true; } else { $sumario_segredo = false; }
            if ($idea->sumario_problema) { $sumario_problema = true; } else { $sumario_problema = false; }
            if ($idea->sumario_solucao) { $sumario_solucao = true; } else { $sumario_solucao = false; }
            if ($idea->sumario_oportunidade) { $sumario_oportunidade = true; } else { $sumario_oportunidade = false; }
            if ($idea->sumario_vontadecompetitiva) { $sumario_vontadecompetitiva = true; } else { $sumario_vontadecompetitiva = false; }
            if ($idea->sumario_modelo) { $sumario_modelo = true; } else { $sumario_modelo = false; }

            if ($titulo && $descricao && $link_video && $canvas_atividades && $canvas_propostas && $canvas_relacionamentos && $canvas_recursos && $canvas_canais && $canvas_parceriaschaves && $canvas_segmentosdemercado && $canvas_estruturadecusto && $canvas_fontesderenda && $sumario_segredo && $sumario_problema && $sumario_solucao && $sumario_oportunidade && $sumario_vontadecompetitiva && $sumario_modelo) {
                $this->set('ideia', true);
            } else {
                $this->set('ideia', false);
            }            
        } else {
            $this->set('ideia', false);
        } 
    }
}
