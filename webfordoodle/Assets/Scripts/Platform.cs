using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Platform : MonoBehaviour {
	public BoxCollider2D playerBoxCollider2d;

	public platformspawner platformSpawnerScript;

	public Transform cameraTrans;

	public gamemanager gamemanagerscript;

	BoxCollider2D myBoxCollider2d;



	void Start(){
		
		myBoxCollider2d = GetComponent<BoxCollider2D> ();
	}
		
	void Update () {
		if (gamemanagerscript.gamerunning) {

		if (playerBoxCollider2d.bounds.min.y < myBoxCollider2d.bounds.max.y && myBoxCollider2d.isTrigger == false)
			myBoxCollider2d.isTrigger = true;
		else if (playerBoxCollider2d.bounds.min.y > myBoxCollider2d.bounds.max.y && myBoxCollider2d.isTrigger == true)
			myBoxCollider2d.isTrigger = false;
		if (transform.position.y <= cameraTrans.position.y - 6f)
			SpawnToANewPosition ();
			
		}
	}

	void SpawnToANewPosition(){
		transform.position = new Vector3 (Random.Range (-2f, 2f), platformSpawnerScript.topPlatformYPos + 2f, 0f);
		platformSpawnerScript.topPlatformYPos += 2f;
	}
}
