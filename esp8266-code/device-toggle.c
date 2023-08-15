#include <ArduinoJson.h>

#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>

#ifndef STASSID
#define STASSID "NISHAALNASEER 3857"
#define STAPSK  "750M9q5?"
#endif

const char* ssid     = STASSID;
const char* password = STAPSK;

void setup() {

  pinMode(LED_BUILTIN, OUTPUT);
  
  Serial.begin(115200);
  
  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("");
  Serial.println("WiFi connected");
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());

}


void loop() {

  WiFiClientSecure client;
  HTTPClient http;  //Declare an object of class HTTPClient

  client.setInsecure();

  String uid = "1691896950";
  String hash = "71523d46f1db6d9fb40cbdf7f837964c";
 

  http.begin(client, "https://vciot.ahmdshan.com/signal.php?uid=" + uid + "&hash=" + hash);  //Specify request destination
  int httpCode = http.GET(); //Send the request


  if ( httpCode > 0 ) {

    String payload = http.getString();

    Serial.println(payload);


    if ( payload == "off" ) {
      digitalWrite(LED_BUILTIN, HIGH);
    } else {
      digitalWrite(LED_BUILTIN, LOW);
    }

  }

  delay(1000);


}


