> [!IMPORTANT]
> ⚠ This is a public archive and the active project has been renamed to **NetAlertX** and moved: [jokob.sk/NetAlertX](https://github.com/jokob-sk/NetAlertX)
> 
>  - To differentiate from the upstream stale project
>  - To differentiate from other active forks
>  - To indicate this is not a Raspberry Pi-specific tool anymore
>
# Overview

PiAlert comes with MQTT support, allowing you to show all detected devices as devices in Home Assistant. It also supplies a collection of stats, such as number of online devices.

## ⚠ Note 

- Please note that discovery takes about ~10s per device.
- Deleting of devices is not handled automatically. Please use [MQTT Explorer](https://mqtt-explorer.com/) to delete devices in the broker (Home Assistant), if needed. 


## 🧭 Guide

> 💡 This guide was tested only with the Mosquitto MQTT broker

1. Enable Mosquitto MQTT in Home Assistant by following the [documentation](https://www.home-assistant.io/integrations/mqtt/)

2. Configure a user name and password on your broker.

3. Note down the following details that you will need to configure PiAlert:
   - MQTT host url (usually your Home Assistant IP)
   - MQTT broker port
   - User
   - Password

4. Open the _PiAlert_ > _Settings_ > _MQTT_ settings group
   - Enable MQTT
   - Fill in the details from above
   - Fill in remaining settings as per description

![Configuration Example][configuration] 

## 📷 Screenshots

  | ![Screen 1][sensors] | ![Screen 2][history] | 
  |----------------------|----------------------| 
  | ![Screen 3][list] | ![Screen 4][overview] | 
  

  [configuration]:   /docs/img/HOME_ASISSTANT/PiAlert-HomeAssistant-Configuration.png           "configuration"
  [sensors]:         /docs/img/HOME_ASISSTANT/PiAlert-HomeAssistant-Device-as-Sensors.png       "sensors"
  [history]:         /docs/img/HOME_ASISSTANT/PiAlert-HomeAssistant-Device-Presence-History.png "history"
  [list]:            /docs/img/HOME_ASISSTANT/PiAlert-HomeAssistant-Devices-List.png            "list"  
  [overview]:        /docs/img/HOME_ASISSTANT/PiAlert-HomeAssistant-Overview-Card.png           "overview"

