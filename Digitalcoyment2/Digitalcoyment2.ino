#include "DHT.h"
#include "WiFi.h"
#include "HTTPClient.h"
#include "WifiClient.h"

#define DHTPIN 32
#define DHTTYPE DHT21

DHT dht(DHTPIN,DHTTYPE);

const char* ssid = "SAMSUNGA51S";
const char* pass = "23111991";

const char* host = "192.168.89.159";

void setup() {
  Serial.begin(9600);
  dht.begin();
  // put your setup code here, to run once:

  WiFi.begin(ssid, pass);
  Serial.println("Connecting...");
  while(WiFi.status() != WL_CONNECTED)
  {
    Serial.print(".");
    delay(500);
  }

    Serial.println("Connected");

}

void loop() {
  float suhu = dht.readTemperature();
  int kelembaban = dht.readHumidity();
  int ldr = analogRead(A0);

  Serial.println(" suhu : " + String(suhu));
  Serial.println(" kelembaban : " + String (kelembaban));
  Serial.println(" ldr : " + String (ldr));

  WiFiClient client ;
  const int httpPort = 80;

  if( !client.connect(host,httpPort))
  {  
    Serial.println ("Connection Failed");
    return;
  }
    String Link ;
    HTTPClient http ;

    Link = "https://" + String(host) + "/multisensor2/kirimdata.php?suhu=" + String(suhu) + "&kelembaban="+ String(kelembaban) + "&ldr=" + String(ldr);
    http.begin(Link);
    http.GET();

    String respon = http.getString();
    Serial.println(respon);
    http.end();

  delay (1000);

}
