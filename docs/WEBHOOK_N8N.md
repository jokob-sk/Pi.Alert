> [!IMPORTANT]
> ⚠ This is a public archive and the active project has been renamed to **NetAlertX** and moved: [jokob.sk/NetAlertX](https://github.com/jokob-sk/NetAlertX)
> 
>  - To differentiate from the upstream stale project
>  - To differentiate from other active forks
>  - To indicate this is not a Raspberry Pi-specific tool anymore
>

### Create a simple n8n workflow

N8N can be used for more advanced conditional notification use cases. For example, you want only to get notified if two out of a specified list of devices is down. Or you can use other plugins to process the notifiations further. The below is a simple example of sending an email on a webhook.  

![n8n workflow](/docs/img/WEBHOOK_N8N/n8n_workflow.png)

### Specify your email template 
See [sample JSON](https://github.com/jokob-sk/Pi.Alert/blob/main/back/webhook_json_sample.json) if you want to see the JSON paths used in the email template below
![Email template](/docs/img/WEBHOOK_N8N/n8n_send_email_settings.png)

```
Events count: {{ $json["body"]["attachments"][0]["text"]["events"].length }}
New devices count: {{ $json["body"]["attachments"][0]["text"]["new_devices"].length }}
```

### Get your webhook in n8n
![n8n webhook URL](/docs/img/WEBHOOK_N8N/n8n_webhook_settings.png)

### Configure PiAlert to point to the above URL
![PiAlert config](/docs/img/WEBHOOK_N8N/Webhook_settings.png)
