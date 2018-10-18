using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class platformspawner : MonoBehaviour {

	[SerializeField]
	gamemanager gamemanagerscript;
	[SerializeField]
	CameraFollow cameraScript;
	[SerializeField]
	GameObject platformPrefab;
	[SerializeField]
	GameObject playerPrefab;
	[SerializeField]
	Transform platformparent;

	BoxCollider2D playerBoxCol2d;

	GameObject playerGo;

	GameObject platformgo;

	public float topPlatformYPos=0;

	void OnEnable(){
		SpawnPlatformStart ();

	}

	void SpawnPlatformStart(){
		float yPos = -4f; 

		float xPos = 0f;

		topPlatformYPos = 0;


		if (platformparent.childCount <= 0) {
			playerGo = Instantiate (playerPrefab, Vector3.zero, Quaternion.identity) as GameObject;


			playerBoxCol2d = playerGo.GetComponent<BoxCollider2D> ();

			getcomponentforplayerscript (playerGo.GetComponent<PlayerController> ());

			cameraScript.player = playerGo.transform;

			getcomponentforgamemanager ();

		} else {
		
			playerGo.SetActive (true);

		}


		for (int i = 0; i < 6; i++) {
			xPos = Random.Range (-2f, 2f);

			if (platformparent.childCount <= i) {
				
				platformgo = Instantiate (platformPrefab, new Vector3 (xPos, yPos, 0f), Quaternion.identity) as GameObject;
				platformgo.transform.SetParent (platformparent);
				Platform platformScript = platformgo.GetComponent<Platform> ();
				getcomponentforplatformscript (platformScript);

			} 
			else {
				platformgo = platformparent.GetChild (i).gameObject;
				platformgo.transform.position = new Vector3 (xPos, yPos, 0f);
			}


			if (i <= 0) {
				playerGo.transform.position = new Vector3 (xPos,yPos+1f,0f);
			}
				
			topPlatformYPos = yPos;	
			yPos += 2f;

		}
	}
	void getcomponentforplatformscript(Platform _platformScript){

		_platformScript.playerBoxCollider2d =playerBoxCol2d;
		_platformScript.platformSpawnerScript = this;
		_platformScript.cameraTrans = cameraScript.gameObject.transform;
		_platformScript.gamemanagerscript = this.gamemanagerscript;
	}

	void getcomponentforplayerscript (PlayerController _playerscript){
		_playerscript.cameraTrans = cameraScript.gameObject.transform;
		_playerscript.gamemanagerscript = this.gamemanagerscript;
	}

	void getcomponentforgamemanager(){
		
		gamemanagerscript.playerscript = playerGo.GetComponent<PlayerController> ();

	}
	void Start(){}
}
