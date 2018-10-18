using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class gamemanager : MonoBehaviour {
	[SerializeField]
	UImanager uimanagerscript;

	[SerializeField]
	platformspawner platformspawnerscript;

	[SerializeField]
	CameraFollow camerascript;

	[HideInInspector]
	public PlayerController playerscript;

	public bool gamerunning=false;

	void Update(){
		
		if(gamerunning)
			uimanagerscript.showscoretext (playerscript.score);

	}


	public void gameover(){

		gamerunning = false;

		playerscript.gameObject.SetActive (false);
		uimanagerscript.gameend ();

		platformspawnerscript.enabled = false;
	
	}

	public void startgame(){


		platformspawnerscript.enabled = true;
		camerascript.resetcam ();
		uimanagerscript.gamestart ();
		playerscript.score = 0;
		playerscript.isdead = false;
		gamerunning = true;

	}
}
