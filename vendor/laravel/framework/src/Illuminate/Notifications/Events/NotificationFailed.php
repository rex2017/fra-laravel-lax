<?php
/**
 * 通知，通知失败
 */

namespace Illuminate\Notifications\Events;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;

class NotificationFailed
{
    use Queueable, SerializesModels;

    /**
     * The notifiable entity who received the notification.
	 * 通知实体应收到通知的
     *
     * @var mixed
     */
    public $notifiable;

    /**
     * The notification instance.
	 * 通知实例
     *
     * @var \Illuminate\Notifications\Notification
     */
    public $notification;

    /**
     * The channel name.
	 * 通道名称
     *
     * @var string
     */
    public $channel;

    /**
     * The data needed to process this failure.
	 * 处理此故障所需的数据
     *
     * @var array
     */
    public $data = [];

    /**
     * Create a new event instance.
	 * 创建新的事件实例
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @param  string  $channel
     * @param  array  $data
     * @return void
     */
    public function __construct($notifiable, $notification, $channel, $data = [])
    {
        $this->data = $data;
        $this->channel = $channel;
        $this->notifiable = $notifiable;
        $this->notification = $notification;
    }
}