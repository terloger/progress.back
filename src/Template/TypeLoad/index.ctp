<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Type Load'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Loads'), ['controller' => 'Loads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Load'), ['controller' => 'Loads', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="typeLoad index large-9 medium-8 columns content">
    <h3><?= __('Type Load') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('color') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($typeLoad as $typeLoad): ?>
            <tr>
                <td><?= $this->Number->format($typeLoad->id) ?></td>
                <td><?= h($typeLoad->name) ?></td>
                <td><?= h($typeLoad->color) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $typeLoad->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $typeLoad->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $typeLoad->id], ['confirm' => __('Are you sure you want to delete # {0}?', $typeLoad->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
