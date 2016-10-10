<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Load'), ['action' => 'edit', $load->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Load'), ['action' => 'delete', $load->id], ['confirm' => __('Are you sure you want to delete # {0}?', $load->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Loads'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Load'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Type Load'), ['controller' => 'TypeLoad', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Type Load'), ['controller' => 'TypeLoad', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Days'), ['controller' => 'Days', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Day'), ['controller' => 'Days', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="loads view large-9 medium-8 columns content">
    <h3><?= h($load->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Type Load') ?></th>
            <td><?= $load->has('type_load') ? $this->Html->link($load->type_load->name, ['controller' => 'TypeLoad', 'action' => 'view', $load->type_load->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Day') ?></th>
            <td><?= $load->has('day') ? $this->Html->link($load->day->date, ['controller' => 'Days', 'action' => 'view', $load->day->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($load->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($load->id) ?></td>
        </tr>
    </table>
</div>
