<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Attachment'), ['action' => 'edit', $attachment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Attachment'), ['action' => 'delete', $attachment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attachment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Attachments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Attachment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="attachments view large-9 medium-8 columns content">
    <h3><?= h($attachment->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Product') ?></th>
            <td><?= $attachment->has('product') ? $this->Html->link($attachment->product->id, ['controller' => 'Products', 'action' => 'view', $attachment->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('At Name') ?></th>
            <td><?= h($attachment->at_name) ?></td>
        </tr>
        <tr>
            <th><?= __('At Description') ?></th>
            <td><?= h($attachment->at_description) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($attachment->id) ?></td>
        </tr>
        <tr>
            <th><?= __('At Sort') ?></th>
            <td><?= $this->Number->format($attachment->at_sort) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($attachment->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($attachment->modified) ?></td>
        </tr>
    </table>
</div>
