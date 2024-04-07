> [!IMPORTANT]
> ⚠ This is a public archive and the active project has been renamed to **NetAlertX** and moved: [jokob.sk/NetAlertX](https://github.com/jokob-sk/NetAlertX)
> 
>  - To differentiate from the upstream stale project
>  - To differentiate from other active forks
>  - To indicate this is not a Raspberry Pi-specific tool anymore
>

# Privacy & Random MAC's
<!--- --------------------------------------------------------------------- --->

The latest versions of some operating systems (IOS and Android) incorporate a
new & interesting functionality to improve privacy: **Random MACs**.

This functionality allows you to **hide the real MAC** of the device and
**assign a random MAC** when we connect to WIFI networks.

This behavior is especially useful when connecting to WIFI's that we do not
know, but it **is totally useless when connecting to our own WIFI's** or known
networks.

**I recommend disabling this operation when connecting our devices to our own
WIFI's**, in this way, Pi.Alert will be able to identify the device, and it
will not identify it as a new device every so often (every time IOS or Android
decides to change the MAC).

**Random MACs** are recognized by the characters "2", "6", "A", or "E" as the 2nd character in the Mac address. You can disable specific prefixes to be detected as random MAC addresses by specifying the `UI_NOT_RANDOM_MAC` setting.

## IOS
![ios][ios]

  - [Use private Wi-Fi addresses in iOS 14](https://support.apple.com/en-us/HT211227)

## Android
![Android][Android]

  - [How to Disable MAC Randomization in Android 10](https://support.boingo.com/s/article/How-to-Disable-MAC-Randomization-in-Android-10-Android-Q)
  - [How do I disable random Wi-Fi MAC address on Android 10](https://support.plume.com/hc/en-gb/articles/360052070714-How-do-I-disable-random-Wi-Fi-MAC-address-on-Android-10-)
  

### License
  GPL 3.0
  [Read more here](../LICENSE.txt)

### Contact
  Always use the Issue tracker for the correct fork, for example: 
  
  [jokob-sk/Pi.Alert](https://github.com/jokob-sk/Pi.Alert/issues). Please also follow the guidelines on:

  - ➕ [Pull Request guidelines](https://github.com/jokob-sk/Pi.Alert/tree/main/docs#-pull-requests-prs) 
  - 🙏 [Feature request guidelines](https://github.com/jokob-sk/Pi.Alert/tree/main/docs#-feature-requests) 
  - 🐛 [Issue guidelines](https://github.com/jokob-sk/Pi.Alert/tree/main/docs#-submitting-an-issue-or-bug)

  
  ***Suggestions and comments are welcome***


<!--- --------------------------------------------------------------------- --->
[ios]: https://9to5mac.com/wp-content/uploads/sites/6/2020/08/how-to-use-private-wifi-mac-address-iphone-ipad.png?resize=2048,1009 "ios"
[Android]: ./img/android_random_mac.jpg "Android"

