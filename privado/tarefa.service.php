<?php
//Criando CRUD da aplicação
class TarefaService {

    private $conexao;
    private $tarefa;

    public function __construct(Conexao $conexao, Tarefa $tarefa) {
        $this->conexao = $conexao->conectar();
        $this->tarefa = $tarefa;
    }

    public function inserir() { 
        $query = 'insert into tb_tarefas(tarefa)values(:tarefa)';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
        $stmt->execute();
    }

    public function recuperar() {
        $query = '
            select 
                t.id, s.status, t.tarefa 
            from 
                tb_tarefas as t
                left join tb_status as s on (t.id_status = S.id
        ';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        $stmt->fetchAll(PDO::FETCH_OBJ);   
        
    }

    public function atualizar() {
        
    }

    public function remover() {
        
    }
}

?>