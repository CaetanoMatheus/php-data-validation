<?php
    require_once("includes/header.php");
    require_once("controller/ComprasController.php");
?>

<div class="bg-hero">
  <div class="bg-overlay"></div>
  <div class="bg-cover" data-stellar-background-ratio="0.5">
    <div class="info">
      <div class="container">
        <div class="row">
          <div class="text-center">
            <div class="tabulation">
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                  <a role="tab" data-toggle="tab">Passagens Compradas</a>
                </li>
              </ul>
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="passagens">
                  <div class="row table-text">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th class="text-center">Nome</th>
                          <th class="text-center">CPF/CNPJ</th>
                          <th class="text-center">Telefone</th>
                          <th class="text-center">Ida</th>
                          <th class="text-center">Volta</th>
                          <th class="text-center">Preço</th>
                          <th class="text-center">Email</th>
                          <th class="text-center">CEP</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="text-center">
                            <?= $cliente->getNome() ?>
                          </td>
                          <td class="text-center">
                            <?= $cliente->getCpfCnpj() ?>
                          </td>
                          <td class="text-center">
                            <?= $cliente->getTelefone() ?>
                          </td>
                          <td class="text-center">
                            <?= $cliente->getEmail() ?>
                          </td>
                          <td class="text-center">
                            <?= $viagem->getDataIda() ?>
                          </td>
                          <td class="text-center">
                            <?= $viagem->getDataRetorno() ?>
                          </td>
                          <td class="text-center">
                            <?= $viagem->getPreco() ?>
                          </td>
                          <td class="text-center">
                            <?= $cliente->getCep() ?>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php require_once("includes/footer.php") ?>
</div>
