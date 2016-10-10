<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Load'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Type Load'), ['controller' => 'TypeLoad', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Type Load'), ['controller' => 'TypeLoad', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Days'), ['controller' => 'Days', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Day'), ['controller' => 'Days', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="loads index large-9 medium-8 columns content">
    <h3><?= __('Loads') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type_load_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('day_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($loads as $load): ?>
            <tr>
                <td><?= $this->Number->format($load->id) ?></td>
                <td><?= $load->has('type_load') ? $this->Html->link($load->type_load->name, ['controller' => 'TypeLoad', 'action' => 'view', $load->type_load->id]) : '' ?></td>
                <td><?= $load->has('day') ? $this->Html->link($load->day->date, ['controller' => 'Days', 'action' => 'view', $load->day->id]) : '' ?></td>
                <td><?= h($load->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $load->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $load->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $load->id], ['confirm' => __('Are you sure you want to delete # {0}?', $load->id)]) ?>
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
