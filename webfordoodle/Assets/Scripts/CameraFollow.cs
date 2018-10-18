using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class CameraFollow : MonoBehaviour {

	[SerializeField]
	gamemanager gamemanagerscript;

	public Transform player;

	Vector3 startpos;
	Vector3 followPos;
	float yPos;

	void Awake(){
		followPos = new Vector3 (transform.position.x, 0, transform.position.z);
		startpos = transform.position;
	}
		

	void Update () {

		if (gamemanagerscript.gamerunning)
			follow ();
	
	}

	void follow(){

		yPos = Mathf.Max (yPos, player.position.y);
		transform.position = followPos + (Vector3.up * yPos);

	}

	public void resetcam(){
	
		transform.position = startpos;
		yPos = player.position.y;
		transform.position = followPos + (Vector3.up * yPos);

	
	}

}
